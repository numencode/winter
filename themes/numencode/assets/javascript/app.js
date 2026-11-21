/*
 * NumenCode Demo theme: counts the numbers of the Counters widget up when they scroll into view
 * (the widget prints the final value, so the numbers are right without JavaScript too).
 */
(function () {
    'use strict';

    var counters = document.querySelectorAll('.counter-value[data-to]');

    if (!counters.length || !('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    function count(element) {
        var target = parseFloat(element.getAttribute('data-to'));
        var decimals = (element.getAttribute('data-to').split('.')[1] || '').length;
        var start = null;
        var duration = 1400;

        if (isNaN(target)) {
            return;
        }

        function step(timestamp) {
            start = start || timestamp;
            var progress = Math.min((timestamp - start) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            element.textContent = (target * eased).toFixed(decimals);

            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        }

        window.requestAnimationFrame(step);
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                observer.unobserve(entry.target);
                count(entry.target);
            }
        });
    }, {threshold: 0.4});

    counters.forEach(function (element) {
        observer.observe(element);
    });
})();
