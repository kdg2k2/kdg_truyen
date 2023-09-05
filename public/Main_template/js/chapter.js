! function(e) {
    var t = {};

    function n(r) {
        if (t[r]) return t[r].exports;
        var o = t[r] = {
            i: r,
            l: !1,
            exports: {}
        };
        return e[r].call(o.exports, o, o.exports, n), o.l = !0, o.exports
    }
    n.m = e, n.c = t, n.d = function(e, t, r) {
        n.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: r
        })
    }, n.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, n.t = function(e, t) {
        if (1 & t && (e = n(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var r = Object.create(null);
        if (n.r(r), Object.defineProperty(r, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var o in e) n.d(r, o, function(t) {
                return e[t]
            }.bind(null, o));
        return r
    }, n.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "/", n(n.s = 162)
}({
    162: function(e, t, n) {
        e.exports = n(163)
    },
    163: function(e, t) {
        var n = 0;
        $(window).scroll((function(e) {
            var t = $(this).scrollTop();
            t > n ? ($(".btn-back-to-top").removeClass("margin-navi"), $("#rd-side_icon").slideUp(100)) : n - t > 10 && ($(".btn-back-to-top").addClass("margin-navi"), $("#rd-side_icon").slideDown(100)), n = t
        })), $("#rd-info_icon, .black-click").on("click", (function() {
            $("#chapters").is(":hidden") ? $("#chapters, .black-click").fadeIn(200) : $("#chapters, .black-click").fadeOut(200)
        })), $(".btn-to-top-dt").click((function() {
            $(document).scrollTop(0)
        })), document.addEventListener("DOMContentLoaded", (function() {
            var e;
            if ("IntersectionObserver" in window) {
                e = document.querySelectorAll(".lazy");
                var t = new IntersectionObserver((function(e, n) {
                    e.forEach((function(e) {
                        if (e.isIntersecting) {
                            var n = e.target;
                            n.src = n.dataset.src, n.classList.remove("lazy"), t.unobserve(n)
                        }
                    }))
                }));
                e.forEach((function(e) {
                    t.observe(e)
                }))
            } else {
                var n, r = function t() {
                    n && clearTimeout(n), n = setTimeout((function() {
                        var n = window.pageYOffset;
                        e.forEach((function(e) {
                            e.offsetTop < window.innerHeight + n && (e.src = e.dataset.src, e.classList.remove("lazy"))
                        })), 0 == e.length && (document.removeEventListener("scroll", t), window.removeEventListener("resize", t), window.removeEventListener("orientationChange", t))
                    }), 20)
                };
                e = document.querySelectorAll(".lazy"), document.addEventListener("scroll", r), window.addEventListener("resize", r), window.addEventListener("orientationChange", r)
            }
        }));
        var r = $('meta[name="manga_id"]').attr("content"),
            o = $('meta[name="chapter_name"]').attr("content"),
            a = localStorage.getItem("my_manga_history") || [];
        for ("string" == typeof a && (a = JSON.parse(a)), i = 0; i < a.length; i++)
            if (a[i].id == r) {
                a[i].chapter_name = o, a[i].chapter_url = window.location.href;
                break
            }
        localStorage.setItem("my_manga_history", JSON.stringify(a)), $(document).keyup((function(e) {
            switch (e.keyCode) {
                case 37:
                    var t = $("meta[name=prev_url]").attr("content");
                    "#" !== t && (window.location.href = t);
                    break;
                case 39:
                    var n = $("meta[name=next_url]").attr("content");
                    "#" !== n && (window.location.href = n)
            }
        }))
    }
});