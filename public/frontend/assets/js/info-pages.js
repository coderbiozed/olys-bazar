/**
 * Olys Bazar — shared interactivity for info pages
 */
(function () {
    function initTabs(navSelector, panelSelector, attr) {
        var tabs = document.querySelectorAll(navSelector);
        var panels = document.querySelectorAll(panelSelector);
        if (!tabs.length) return;

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                var target = tab.getAttribute(attr);

                tabs.forEach(function (t) {
                    t.classList.remove('is-active');
                    t.setAttribute('aria-selected', 'false');
                });
                panels.forEach(function (p) {
                    p.classList.remove('is-active');
                    if (p.hidden !== undefined) p.hidden = true;
                });

                tab.classList.add('is-active');
                tab.setAttribute('aria-selected', 'true');
                var panel = document.getElementById(target);
                if (panel) {
                    panel.classList.add('is-active');
                    if (panel.hidden !== undefined) panel.hidden = false;
                }
            });
        });
    }

    function initAccordion(selector) {
        document.querySelectorAll(selector).forEach(function (btn) {
            btn.addEventListener('click', function () {
                var item = btn.closest('.ip-faq__item');
                var isOpen = item.classList.contains('is-open');

                document.querySelectorAll('.ip-faq__item').forEach(function (el) {
                    el.classList.remove('is-open');
                    var q = el.querySelector('.ip-faq__question');
                    if (q) q.setAttribute('aria-expanded', 'false');
                });

                if (!isOpen) {
                    item.classList.add('is-open');
                    btn.setAttribute('aria-expanded', 'true');
                }
            });
        });
    }

    function initStepFlow(stepSelector, panelSelector) {
        var steps = document.querySelectorAll(stepSelector);
        var panels = document.querySelectorAll(panelSelector);
        if (!steps.length) return;

        steps.forEach(function (step, i) {
            step.addEventListener('click', function () {
                steps.forEach(function (s) { s.classList.remove('is-active'); });
                panels.forEach(function (p) { p.classList.remove('is-active'); });
                step.classList.add('is-active');
                if (panels[i]) panels[i].classList.add('is-active');
            });
        });
    }

    initTabs('.ip-tabs__btn', '.ip-tabs__panel', 'data-panel');
    initTabs('.ip-policy-nav button', '.ip-policy-section', 'data-section');
    initAccordion('.ip-faq__question');
    initStepFlow('.ip-status-step', '.ip-status-detail');
})();
