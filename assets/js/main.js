/* ==========================================================================
   Peddlers 30A — page behaviour
   Vanilla ES modules-free script; safe to load with a plain <script> tag.
   ========================================================================== */

(function () {
  "use strict";

  /* ------------------------------------------------------------------------
     Mobile navigation
     ------------------------------------------------------------------------ */
  function initHeader() {
    var header = document.querySelector(".site-header");
    if (!header) return;

    var toggle = header.querySelector(".site-header__toggle");
    var nav = header.querySelector(".site-nav");
    var overlay = document.querySelector(".site-header__overlay");
    if (!toggle || !nav) return;

    nav.id = nav.id || "site-nav";

    function setOpen(open) {
      header.classList.toggle("is-open", open);
      toggle.setAttribute("aria-expanded", String(open));
      toggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
      if (overlay) overlay.hidden = !open;
      document.body.classList.toggle("has-open-nav", open);
    }

    toggle.addEventListener("click", function () {
      setOpen(!header.classList.contains("is-open"));
    });

    // Tapping the dimmed backdrop closes the sidebar, same as choosing
    // a destination or pressing Escape.
    if (overlay) {
      overlay.addEventListener("click", function () {
        setOpen(false);
      });
    }

    // Close the panel after choosing a destination.
    nav.addEventListener("click", function (event) {
      if (event.target.closest("a")) setOpen(false);
    });

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") setOpen(false);
    });
  }

  /* ------------------------------------------------------------------------
     Horizontal rails (bike carousel)
     Arrows scroll by one card; the sand track underneath reflects position.
     ------------------------------------------------------------------------ */
  function initRails() {
    var rails = document.querySelectorAll("[data-rail]");

    Array.prototype.forEach.call(rails, function (rail) {
      var name = rail.getAttribute("data-rail");
      var nav = document.querySelector('[data-rail-nav="' + name + '"]');
      var thumb = document.querySelector('[data-rail-thumb="' + name + '"]');

      function step() {
        var first = rail.firstElementChild;
        if (!first) return rail.clientWidth;
        var styles = window.getComputedStyle(rail);
        var gap = parseFloat(styles.columnGap || styles.gap) || 0;
        return first.getBoundingClientRect().width + gap;
      }

      function maxScroll() {
        return Math.max(0, rail.scrollWidth - rail.clientWidth);
      }

      function sync() {
        var max = maxScroll();

        if (thumb) {
          var ratio = rail.clientWidth / rail.scrollWidth;
          var visible = Math.min(1, ratio);
          thumb.style.width = (visible * 100).toFixed(2) + "%";
          var progress = max ? rail.scrollLeft / max : 0;
          var travel = (1 - visible) * rail.clientWidth * progress;
          thumb.style.transform = "translateX(" + travel + "px)";
        }

        if (nav) {
          var prev = nav.querySelector('[data-dir="-1"]');
          var next = nav.querySelector('[data-dir="1"]');
          // 1px tolerance keeps sub-pixel scroll widths from sticking.
          if (prev) prev.disabled = rail.scrollLeft <= 1;
          if (next) next.disabled = rail.scrollLeft >= max - 1;
        }
      }

      if (nav) {
        nav.addEventListener("click", function (event) {
          var button = event.target.closest("[data-dir]");
          if (!button) return;
          rail.scrollBy({
            left: Number(button.getAttribute("data-dir")) * step(),
            behavior: "smooth"
          });
        });
      }

      rail.addEventListener("scroll", sync, { passive: true });
      window.addEventListener("resize", sync);
      sync();
    });
  }

  /* ------------------------------------------------------------------------
     Testimonials carousel arrows
     ------------------------------------------------------------------------ */
  function initTestimonialsNav() {
    var navs = document.querySelectorAll(".testimonials__nav");

    Array.prototype.forEach.call(navs, function (nav) {
      var section = nav.closest("section") || document;
      var grid = section.querySelector(".testimonials__grid");
      if (!grid) return;

      var buttons = nav.querySelectorAll(".carousel-nav__btn");
      var prevBtn = buttons[0];
      var nextBtn = buttons[1];

      function step() {
        var first = grid.firstElementChild;
        if (!first) return grid.clientWidth;
        var styles = window.getComputedStyle(grid);
        var gap = parseFloat(styles.columnGap || styles.gap) || 0;
        return first.getBoundingClientRect().width + gap;
      }

      if (prevBtn) {
        prevBtn.addEventListener("click", function () {
          grid.scrollBy({ left: -step(), behavior: "smooth" });
        });
      }
      if (nextBtn) {
        nextBtn.addEventListener("click", function () {
          grid.scrollBy({ left: step(), behavior: "smooth" });
        });
      }
    });
  }

  /* ------------------------------------------------------------------------
     Accordion (used by the FAQ section)
     ------------------------------------------------------------------------ */
  function initAccordions() {
    var triggers = document.querySelectorAll(".accordion__trigger");

    Array.prototype.forEach.call(triggers, function (trigger) {
      var item = trigger.closest(".accordion__item");
      if (!item) return;

      trigger.setAttribute("aria-expanded", String(item.classList.contains("is-open")));

      trigger.addEventListener("click", function () {
        var open = !item.classList.contains("is-open");
        var group = item.parentElement;

        // One panel at a time, matching the design.
        Array.prototype.forEach.call(
          group.querySelectorAll(".accordion__item"),
          function (sibling) {
            sibling.classList.remove("is-open");
            var siblingTrigger = sibling.querySelector(".accordion__trigger");
            if (siblingTrigger) siblingTrigger.setAttribute("aria-expanded", "false");
          }
        );

        item.classList.toggle("is-open", open);
        trigger.setAttribute("aria-expanded", String(open));
      });
    });
  }

  /* ------------------------------------------------------------------------
     Segmented controls (rentals hub: bike categories, pricing durations)
     One button in the group carries .is-active at a time. The fleet and tier
     data still comes from the markup, so this only moves the selection.
     ------------------------------------------------------------------------ */
  function initSegmented() {
    var groups = document.querySelectorAll("[data-segmented]");

    Array.prototype.forEach.call(groups, function (group) {
      group.addEventListener("click", function (event) {
        var button = event.target.closest("button");
        if (!button || !group.contains(button)) return;

        Array.prototype.forEach.call(
          group.querySelectorAll("button"),
          function (sibling) {
            var on = sibling === button;
            sibling.classList.toggle("is-active", on);
            sibling.setAttribute("aria-selected", String(on));
          }
        );
      });
    });
  }

  /* ------------------------------------------------------------------------
     Vertical marquees (the Curated Gathering columns)

     Each track holds one set of cards. To loop without a visible seam the
     track has to be taller than its window plus the distance it travels, so
     the set is cloned until that holds. The animation then shifts by exactly
     one set height (plus the gap that follows it), which puts clone n where
     clone n-1 was — the jump back to 0% is invisible.
     ------------------------------------------------------------------------ */
  var MARQUEE_SPEED = 34; // px per second — slow enough to read

  function initMarquees() {
    var reduced =
      window.matchMedia &&
      window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (reduced) return;

    var cols = document.querySelectorAll("[data-marquee]");

    Array.prototype.forEach.call(cols, function (col) {
      var track = col.querySelector(".venue-col__track");
      if (!track || !track.children.length) return;

      var originals = Array.prototype.slice.call(track.children);

      function measure() {
        var gap = parseFloat(window.getComputedStyle(track).rowGap) || 0;
        var set = 0;
        originals.forEach(function (el) {
          set += el.getBoundingClientRect().height + gap;
        });
        return { gap: gap, set: set };
      }

      function layout() {
        // Drop any clones from a previous pass before re-measuring.
        Array.prototype.slice
          .call(track.querySelectorAll("[data-marquee-clone]"))
          .forEach(function (el) {
            el.remove();
          });

        var m = measure();
        if (!m.set) return;

        var needed = col.clientHeight + m.set;
        var height = m.set;
        // Guard the loop: a handful of copies is always enough in practice.
        for (var i = 0; i < 8 && height < needed; i++) {
          originals.forEach(function (el) {
            var clone = el.cloneNode(true);
            clone.setAttribute("aria-hidden", "true");
            clone.setAttribute("data-marquee-clone", "");
            track.appendChild(clone);
          });
          height += m.set;
        }

        track.style.setProperty("--marquee-shift", m.set + "px");
        track.style.setProperty(
          "--marquee-duration",
          m.set / MARQUEE_SPEED + "s"
        );
      }

      layout();

      // Images settle after load and change the set height, so re-measure.
      var imgs = track.querySelectorAll("img");
      var pending = imgs.length;
      Array.prototype.forEach.call(imgs, function (img) {
        if (img.complete) {
          pending--;
          return;
        }
        img.addEventListener("load", function () {
          if (--pending <= 0) layout();
        });
        img.addEventListener("error", function () {
          if (--pending <= 0) layout();
        });
      });

      var resizeTimer;
      window.addEventListener("resize", function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(layout, 200);
      });
    });
  }

  function initLenis() {
    if (typeof Lenis === "undefined") return;
    
    var lenis = new Lenis();

    function raf(time) {
      lenis.raf(time);
      requestAnimationFrame(raf);
    }

    requestAnimationFrame(raf);

    var anchorLinks = document.querySelectorAll('a[href^="#"]');
    Array.prototype.forEach.call(anchorLinks, function (anchor) {
      anchor.addEventListener("click", function (e) {
        var targetId = this.getAttribute("href");
        if (targetId === "#") return;
        var targetElement = document.querySelector(targetId);
        if (targetElement) {
          e.preventDefault();
          lenis.scrollTo(targetElement);
        }
      });
    });
  }

  /* ------------------------------------------------------------------------
     Date range selector (product-detail page)
     A calendar dropdown built and styled to match the site, rather than the
     browser/OS's own native date-picker chrome. Picking a start date raises
     the end field's floor so an end date before it can't be chosen.
     ------------------------------------------------------------------------ */
  function initDateSelector() {
    var fields = document.querySelectorAll(".date-selector__field");
    if (!fields.length) return;

    var MONTH_NAMES = [
      "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December",
    ];

    var pickers = {};
    var panels = [];

    function formatDate(date) {
      return date.toLocaleDateString("en-US", {
        month: "short",
        day: "numeric",
        year: "numeric",
      });
    }

    function closeAll() {
      panels.forEach(function (entry) {
        entry.panel.hidden = true;
        entry.btn.setAttribute("aria-expanded", "false");
      });
    }

    Array.prototype.forEach.call(fields, function (field) {
      var key = field.getAttribute("data-date-field");
      var btn = field.querySelector(".date-selector__btn");
      var label = btn.querySelector("span");
      var defaultLabel = label.textContent;
      var panel = field.querySelector(".date-picker");
      var monthLabel = panel.querySelector(".date-picker__month");
      var daysEl = panel.querySelector(".date-picker__days");
      var prevBtn = panel.querySelector("[data-cal-prev]");
      var nextBtn = panel.querySelector("[data-cal-next]");

      panels.push({ panel: panel, btn: btn });

      var today = new Date();
      today.setHours(0, 0, 0, 0);

      var state = {
        selected: null,
        minDate: null,
        viewYear: today.getFullYear(),
        viewMonth: today.getMonth(),
      };

      function render() {
        monthLabel.textContent = MONTH_NAMES[state.viewMonth] + " " + state.viewYear;
        daysEl.innerHTML = "";

        var floor = state.minDate && state.minDate > today ? state.minDate : today;
        var firstOfMonth = new Date(state.viewYear, state.viewMonth, 1);
        var daysInMonth = new Date(state.viewYear, state.viewMonth + 1, 0).getDate();

        for (var i = 0; i < firstOfMonth.getDay(); i++) {
          daysEl.appendChild(document.createElement("span"));
        }

        for (var d = 1; d <= daysInMonth; d++) {
          var date = new Date(state.viewYear, state.viewMonth, d);
          var dayBtn = document.createElement("button");
          dayBtn.type = "button";
          dayBtn.className = "date-picker__day";
          dayBtn.textContent = String(d);

          if (date < floor) {
            dayBtn.disabled = true;
          }

          if (state.selected && date.getTime() === state.selected.getTime()) {
            dayBtn.classList.add("is-selected");
          }

          dayBtn.addEventListener("click", (function (chosenDate) {
            return function () {
              state.selected = chosenDate;
              label.textContent = formatDate(chosenDate);
              btn.classList.add("has-value");
              panel.hidden = true;
              btn.setAttribute("aria-expanded", "false");
              render();

              if (key === "start" && pickers.end) {
                pickers.end.setMin(chosenDate);
              }
            };
          })(date));

          daysEl.appendChild(dayBtn);
        }

        var floorMonth = new Date(floor.getFullYear(), floor.getMonth(), 1);
        prevBtn.disabled =
          state.viewYear === floorMonth.getFullYear() &&
          state.viewMonth === floorMonth.getMonth();
      }

      prevBtn.addEventListener("click", function () {
        state.viewMonth -= 1;
        if (state.viewMonth < 0) {
          state.viewMonth = 11;
          state.viewYear -= 1;
        }
        render();
      });

      nextBtn.addEventListener("click", function () {
        state.viewMonth += 1;
        if (state.viewMonth > 11) {
          state.viewMonth = 0;
          state.viewYear += 1;
        }
        render();
      });

      btn.addEventListener("click", function (event) {
        event.stopPropagation();
        var isOpen = !panel.hidden;
        closeAll();
        panel.hidden = isOpen;
        btn.setAttribute("aria-expanded", String(!isOpen));
      });

      panel.addEventListener("click", function (event) {
        event.stopPropagation();
      });

      pickers[key] = {
        setMin: function (date) {
          state.minDate = date;
          if (state.selected && state.selected < date) {
            state.selected = null;
            label.textContent = defaultLabel;
            btn.classList.remove("has-value");
          }
          state.viewYear = date.getFullYear();
          state.viewMonth = date.getMonth();
          render();
        },
      };

      render();
    });

    document.addEventListener("click", closeAll);
    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") closeAll();
    });
  }

  function init() {
    initHeader();
    initRails();
    initTestimonialsNav();
    initAccordions();
    initSegmented();
    initMarquees();
    initDateSelector();
    initLenis();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
