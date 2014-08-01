(function(e) {
    "use strict";
    e.fn.navToSelect = function(t) {
        var n = {select: "", list: "ul", item: "li", active: "active", header: "Main Navigation"};
        return t = e.extend(n, t), this.each(function() {
            var n = e(this), r = t.select !== "" ? e(t.select) : e("<select/>").addClass("navToSelect");
            t.header !== "" && r.append(e("<option/>").text(t.header));
            var i = "";
            n.find("a").each(function() {
                i += '<option value="' + e(this).attr("href") + '">';
                var n;
                for (n = 0; n < e(this).parents(t.item).length - 1; n++)
                    i += "- ";
                i += e(this).text() + "</option>"
            }), r.append(i), r.change(function() {
                window.location.href = e(this).val()
            }), t.select === "" && n.after(r)
        })
    }
})(jQuery, 0);