M.qtype_multianswerwiris = M.qtype_multianswerwiris || {};

M.qtype_multianswerwiris.init = function (Y, questiondiv) {
    Y.one(questiondiv).all('span.subquestion').each(function(subqspan, i) {
        var feedbackspan = subqspan.one('.feedbackspan');
        if (!feedbackspan) {
            return;
        }

        var overlay = new Y.Overlay({
            srcNode: feedbackspan,
            visible: false,
            align: {
                node: subqspan,
                points: [Y.WidgetPositionAlign.TC, Y.WidgetPositionAlign.BC]
            }
        });
        overlay.render();

        Y.on('mouseover', function() { overlay.show(); }, subqspan);
        Y.on('mouseout', function() { overlay.hide(); }, subqspan);

        feedbackspan.removeClass('accesshide');
    });
};
