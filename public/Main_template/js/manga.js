! function(t) {
    var e = {};

    function n(a) {
        if (e[a]) return e[a].exports;
        var o = e[a] = {
            i: a,
            l: !1,
            exports: {}
        };
        return t[a].call(o.exports, o, o.exports, n), o.l = !0, o.exports
    }
    n.m = t, n.c = e, n.d = function(t, e, a) {
        n.o(t, e) || Object.defineProperty(t, e, {
            enumerable: !0,
            get: a
        })
    }, n.r = function(t) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(t, "__esModule", {
            value: !0
        })
    }, n.t = function(t, e) {
        if (1 & e && (t = n(t)), 8 & e) return t;
        if (4 & e && "object" == typeof t && t && t.__esModule) return t;
        var a = Object.create(null);
        if (n.r(a), Object.defineProperty(a, "default", {
                enumerable: !0,
                value: t
            }), 2 & e && "string" != typeof t)
            for (var o in t) n.d(a, o, function(e) {
                return t[e]
            }.bind(null, o));
        return a
    }, n.n = function(t) {
        var e = t && t.__esModule ? function() {
            return t.default
        } : function() {
            return t
        };
        return n.d(e, "a", e), e
    }, n.o = function(t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }, n.p = "/", n(n.s = 160)
}({
    160: function(t, e, n) {
        t.exports = n(161)
    },
    161: function(t, e) {
        function n() {
            $(document).width() < 600 ? $(".card-hidden-mb").addClass("collapsed-card") : $(".card-hidden-mb").removeClass("collapsed-card")
        }
        $(window).on("resize", (function() {
            n()
        })), $("span.star-evaluate-item").on("click", (function() {
            var t = $(this).data("value");
            $.post("/action/manga/rating", {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $('meta[name="manga_id"]').attr("content"),
                value: t
            }, (function(t) {
                "success" == t.status ? alertify.alert("Cảm ơn bạn đã đánh giá truyện") : t.message ? alertify.alert(t.message) : alertify.alert("Error")
            }), "json")
        })), $("#collect").on("click", (function(t) {
            $.post("/action/manga/collect", {
                _token: $('meta[name="csrf-token"]').attr("content"),
                manga_id: $('meta[name="manga_id"]').attr("content")
            }, (function(t) {
                var e = $("#collect");
                "success" == t.status ? (t.collected ? alertify.alert("Bạn đã theo dõi truyện.") : alertify.alert("Bạn đã ngừng theo dõi truyện."), e.find("i").toggleClass("far fas"), e.find(".feature-name").text(t.favorite_count)) : ($(".summary-content").css({
                    maxHeight: "150px",
                    overflow: "hidden"
                }), _this.html('<i class="fa fa-angle-double-down" aria-hidden="true"></i> Xem thêm'))
            }), "json")
        })), $("#like").on("click", (function(t) {
            $.post("/action/like/manga", {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $('meta[name="manga_id"]').attr("content")
            }, (function(t) {
                var e = $("#like");
                "success" == t.status ? (t.collected ? alertify.alert("Bạn đã like truyện.") : alertify.alert("Bạn đã huỷ like truyện."), e.find("i").toggleClass("far fas"), e.find(".feature-name").text(t.like_count)) : ($(".summary-content").css({
                    maxHeight: "150px",
                    overflow: "hidden"
                }), _this.html('<i class="fa fa-angle-double-down" aria-hidden="true"></i> Xem thêm'))
            }), "json")
        })), $("#dislike").on("click", (function(t) {
            $.post("/action/dislike/manga", {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $('meta[name="manga_id"]').attr("content")
            }, (function(t) {
                var e = $("#dislike");
                "success" == t.status ? (t.collected ? alertify.alert("Bạn đã dislike truyện.") : alertify.alert("Bạn đã huỷ dislike truyện."), e.find("i").toggleClass("far fas"), e.find(".feature-name").text(t.dislike_count)) : ($(".summary-content").css({
                    maxHeight: "150px",
                    overflow: "hidden"
                }), _this.html('<i class="fa fa-angle-double-down" aria-hidden="true"></i> Xem thêm'))
            }), "json")
        })), $(".feature-section .summary-content").outerHeight() >= 100 && $(".feature-section .summary-more").removeClass("d-none"), $('[data-ln-click="more-item"]').on("click", (function(t) {
            var e = $(this);
            e.prevAll().fadeIn(), e.hide()
        })), $(".summary-more").click((function(t) {
            t.preventDefault();
            var e = $(this),
                n = $(this).find(".see_more");
            return e.hasClass("more-state") ? ($(".feature-section .summary-content").css({
                maxHeight: "none",
                overflow: ""
            }), n.html("Ẩn đi")) : ($(".feature-section .summary-content").css({
                maxHeight: "100px",
                overflow: "hidden"
            }), n.html("Xem thêm")), e.toggleClass("more-state less-state"), !1
        })), $((function() {
            n(), $('[data-toggle="tooltip"]').tooltip()
        }));
        var a = {
                id: $('meta[name="manga_id"]').attr("content"),
                name: $('meta[property="og:title"]').attr("content"),
                cover_url: $('meta[property="og:image"]').attr("content"),
                pilot: $('meta[property="og:description"]').attr("content"),
                url: $('meta[property="og:url"]').attr("content")
            },
            o = localStorage.getItem("my_manga_history") || [];
        "string" == typeof o && (o = JSON.parse(o)), o.some((function(t) {
            return t.id === a.id
        })) || o.push(a), localStorage.setItem("my_manga_history", JSON.stringify(o))
    }
});