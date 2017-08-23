/*! jquery.cookie v1.4.1 | MIT */
!function (a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? a(require("jquery")) : a(jQuery)
}(function (a) {
    function b(a) {
        return h.raw ? a : encodeURIComponent(a)
    }

    function c(a) {
        return h.raw ? a : decodeURIComponent(a)
    }

    function d(a) {
        return b(h.json ? JSON.stringify(a) : String(a))
    }

    function e(a) {
        0 === a.indexOf('"') && (a = a.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\"));
        try {
            return a = decodeURIComponent(a.replace(g, " ")), h.json ? JSON.parse(a) : a
        } catch (b) {
        }
    }

    function f(b, c) {
        var d = h.raw ? b : e(b);
        return a.isFunction(c) ? c(d) : d
    }

    var g = /\+/g, h = a.cookie = function (e, g, i) {
        if (void 0 !== g && !a.isFunction(g)) {
            if (i = a.extend({}, h.defaults, i), "number" == typeof i.expires) {
                var j = i.expires, k = i.expires = new Date;
                k.setTime(+k + 864e5 * j)
            }
            return document.cookie = [b(e), "=", d(g), i.expires ? "; expires=" + i.expires.toUTCString() : "", i.path ? "; path=" + i.path : "", i.domain ? "; domain=" + i.domain : "", i.secure ? "; secure" : ""].join("")
        }
        for (var l = e ? void 0 : {}, m = document.cookie ? document.cookie.split("; ") : [], n = 0, o = m.length; o > n; n++) {
            var p = m[n].split("="), q = c(p.shift()), r = p.join("=");
            if (e && e === q) {
                l = f(r, g);
                break
            }
            e || void 0 === (r = f(r)) || (l[q] = r)
        }
        return l
    };
    h.defaults = {}, a.removeCookie = function (b, c) {
        return void 0 === a.cookie(b) ? !1 : (a.cookie(b, "", a.extend({}, c, {expires: -1})), !a.cookie(b))
    }
});


//     Underscore.js 1.8.3
//     http://underscorejs.org
//     (c) 2009-2015 Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors
//     Underscore may be freely distributed under the MIT license.
(function () {
    function n(n) {
        function t(t, r, e, u, i, o) {
            for (; i >= 0 && o > i; i += n) {
                var a = u ? u[i] : i;
                e = r(e, t[a], a, t)
            }
            return e
        }

        return function (r, e, u, i) {
            e = b(e, i, 4);
            var o = !k(r) && m.keys(r), a = (o || r).length, c = n > 0 ? 0 : a - 1;
            return arguments.length < 3 && (u = r[o ? o[c] : c], c += n), t(r, e, u, o, c, a)
        }
    }

    function t(n) {
        return function (t, r, e) {
            r = x(r, e);
            for (var u = O(t), i = n > 0 ? 0 : u - 1; i >= 0 && u > i; i += n)if (r(t[i], i, t))return i;
            return -1
        }
    }

    function r(n, t, r) {
        return function (e, u, i) {
            var o = 0, a = O(e);
            if ("number" == typeof i) n > 0 ? o = i >= 0 ? i : Math.max(i + a, o) : a = i >= 0 ? Math.min(i + 1, a) : i + a + 1; else if (r && i && a)return i = r(e, u), e[i] === u ? i : -1;
            if (u !== u)return i = t(l.call(e, o, a), m.isNaN), i >= 0 ? i + o : -1;
            for (i = n > 0 ? o : a - 1; i >= 0 && a > i; i += n)if (e[i] === u)return i;
            return -1
        }
    }

    function e(n, t) {
        var r = I.length, e = n.constructor, u = m.isFunction(e) && e.prototype || a, i = "constructor";
        for (m.has(n, i) && !m.contains(t, i) && t.push(i); r--;)i = I[r], i in n && n[i] !== u[i] && !m.contains(t, i) && t.push(i)
    }

    var u = this, i = u._, o = Array.prototype, a = Object.prototype, c = Function.prototype, f = o.push, l = o.slice, s = a.toString, p = a.hasOwnProperty, h = Array.isArray, v = Object.keys, g = c.bind, y = Object.create, d = function () {
    }, m = function (n) {
        return n instanceof m ? n : this instanceof m ? void(this._wrapped = n) : new m(n)
    };
    "undefined" != typeof exports ? ("undefined" != typeof module && module.exports && (exports = module.exports = m), exports._ = m) : u._ = m, m.VERSION = "1.8.3";
    var b = function (n, t, r) {
        if (t === void 0)return n;
        switch (null == r ? 3 : r) {
            case 1:
                return function (r) {
                    return n.call(t, r)
                };
            case 2:
                return function (r, e) {
                    return n.call(t, r, e)
                };
            case 3:
                return function (r, e, u) {
                    return n.call(t, r, e, u)
                };
            case 4:
                return function (r, e, u, i) {
                    return n.call(t, r, e, u, i)
                }
        }
        return function () {
            return n.apply(t, arguments)
        }
    }, x = function (n, t, r) {
        return null == n ? m.identity : m.isFunction(n) ? b(n, t, r) : m.isObject(n) ? m.matcher(n) : m.property(n)
    };
    m.iteratee = function (n, t) {
        return x(n, t, 1 / 0)
    };
    var _ = function (n, t) {
        return function (r) {
            var e = arguments.length;
            if (2 > e || null == r)return r;
            for (var u = 1; e > u; u++)for (var i = arguments[u], o = n(i), a = o.length, c = 0; a > c; c++) {
                var f = o[c];
                t && r[f] !== void 0 || (r[f] = i[f])
            }
            return r
        }
    }, j = function (n) {
        if (!m.isObject(n))return {};
        if (y)return y(n);
        d.prototype = n;
        var t = new d;
        return d.prototype = null, t
    }, w = function (n) {
        return function (t) {
            return null == t ? void 0 : t[n]
        }
    }, A = Math.pow(2, 53) - 1, O = w("length"), k = function (n) {
        var t = O(n);
        return "number" == typeof t && t >= 0 && A >= t
    };
    m.each = m.forEach = function (n, t, r) {
        t = b(t, r);
        var e, u;
        if (k(n))for (e = 0, u = n.length; u > e; e++)t(n[e], e, n); else {
            var i = m.keys(n);
            for (e = 0, u = i.length; u > e; e++)t(n[i[e]], i[e], n)
        }
        return n
    }, m.map = m.collect = function (n, t, r) {
        t = x(t, r);
        for (var e = !k(n) && m.keys(n), u = (e || n).length, i = Array(u), o = 0; u > o; o++) {
            var a = e ? e[o] : o;
            i[o] = t(n[a], a, n)
        }
        return i
    }, m.reduce = m.foldl = m.inject = n(1), m.reduceRight = m.foldr = n(-1), m.find = m.detect = function (n, t, r) {
        var e;
        return e = k(n) ? m.findIndex(n, t, r) : m.findKey(n, t, r), e !== void 0 && e !== -1 ? n[e] : void 0
    }, m.filter = m.select = function (n, t, r) {
        var e = [];
        return t = x(t, r), m.each(n, function (n, r, u) {
            t(n, r, u) && e.push(n)
        }), e
    }, m.reject = function (n, t, r) {
        return m.filter(n, m.negate(x(t)), r)
    }, m.every = m.all = function (n, t, r) {
        t = x(t, r);
        for (var e = !k(n) && m.keys(n), u = (e || n).length, i = 0; u > i; i++) {
            var o = e ? e[i] : i;
            if (!t(n[o], o, n))return !1
        }
        return !0
    }, m.some = m.any = function (n, t, r) {
        t = x(t, r);
        for (var e = !k(n) && m.keys(n), u = (e || n).length, i = 0; u > i; i++) {
            var o = e ? e[i] : i;
            if (t(n[o], o, n))return !0
        }
        return !1
    }, m.contains = m.includes = m.include = function (n, t, r, e) {
        return k(n) || (n = m.values(n)), ("number" != typeof r || e) && (r = 0), m.indexOf(n, t, r) >= 0
    }, m.invoke = function (n, t) {
        var r = l.call(arguments, 2), e = m.isFunction(t);
        return m.map(n, function (n) {
            var u = e ? t : n[t];
            return null == u ? u : u.apply(n, r)
        })
    }, m.pluck = function (n, t) {
        return m.map(n, m.property(t))
    }, m.where = function (n, t) {
        return m.filter(n, m.matcher(t))
    }, m.findWhere = function (n, t) {
        return m.find(n, m.matcher(t))
    }, m.max = function (n, t, r) {
        var e, u, i = -1 / 0, o = -1 / 0;
        if (null == t && null != n) {
            n = k(n) ? n : m.values(n);
            for (var a = 0, c = n.length; c > a; a++)e = n[a], e > i && (i = e)
        } else t = x(t, r), m.each(n, function (n, r, e) {
            u = t(n, r, e), (u > o || u === -1 / 0 && i === -1 / 0) && (i = n, o = u)
        });
        return i
    }, m.min = function (n, t, r) {
        var e, u, i = 1 / 0, o = 1 / 0;
        if (null == t && null != n) {
            n = k(n) ? n : m.values(n);
            for (var a = 0, c = n.length; c > a; a++)e = n[a], i > e && (i = e)
        } else t = x(t, r), m.each(n, function (n, r, e) {
            u = t(n, r, e), (o > u || 1 / 0 === u && 1 / 0 === i) && (i = n, o = u)
        });
        return i
    }, m.shuffle = function (n) {
        for (var t, r = k(n) ? n : m.values(n), e = r.length, u = Array(e), i = 0; e > i; i++)t = m.random(0, i), t !== i && (u[i] = u[t]), u[t] = r[i];
        return u
    }, m.sample = function (n, t, r) {
        return null == t || r ? (k(n) || (n = m.values(n)), n[m.random(n.length - 1)]) : m.shuffle(n).slice(0, Math.max(0, t))
    }, m.sortBy = function (n, t, r) {
        return t = x(t, r), m.pluck(m.map(n, function (n, r, e) {
            return {value: n, index: r, criteria: t(n, r, e)}
        }).sort(function (n, t) {
            var r = n.criteria, e = t.criteria;
            if (r !== e) {
                if (r > e || r === void 0)return 1;
                if (e > r || e === void 0)return -1
            }
            return n.index - t.index
        }), "value")
    };
    var F = function (n) {
        return function (t, r, e) {
            var u = {};
            return r = x(r, e), m.each(t, function (e, i) {
                var o = r(e, i, t);
                n(u, e, o)
            }), u
        }
    };
    m.groupBy = F(function (n, t, r) {
        m.has(n, r) ? n[r].push(t) : n[r] = [t]
    }), m.indexBy = F(function (n, t, r) {
        n[r] = t
    }), m.countBy = F(function (n, t, r) {
        m.has(n, r) ? n[r]++ : n[r] = 1
    }), m.toArray = function (n) {
        return n ? m.isArray(n) ? l.call(n) : k(n) ? m.map(n, m.identity) : m.values(n) : []
    }, m.size = function (n) {
        return null == n ? 0 : k(n) ? n.length : m.keys(n).length
    }, m.partition = function (n, t, r) {
        t = x(t, r);
        var e = [], u = [];
        return m.each(n, function (n, r, i) {
            (t(n, r, i) ? e : u).push(n)
        }), [e, u]
    }, m.first = m.head = m.take = function (n, t, r) {
        return null == n ? void 0 : null == t || r ? n[0] : m.initial(n, n.length - t)
    }, m.initial = function (n, t, r) {
        return l.call(n, 0, Math.max(0, n.length - (null == t || r ? 1 : t)))
    }, m.last = function (n, t, r) {
        return null == n ? void 0 : null == t || r ? n[n.length - 1] : m.rest(n, Math.max(0, n.length - t))
    }, m.rest = m.tail = m.drop = function (n, t, r) {
        return l.call(n, null == t || r ? 1 : t)
    }, m.compact = function (n) {
        return m.filter(n, m.identity)
    };
    var S = function (n, t, r, e) {
        for (var u = [], i = 0, o = e || 0, a = O(n); a > o; o++) {
            var c = n[o];
            if (k(c) && (m.isArray(c) || m.isArguments(c))) {
                t || (c = S(c, t, r));
                var f = 0, l = c.length;
                for (u.length += l; l > f;)u[i++] = c[f++]
            } else r || (u[i++] = c)
        }
        return u
    };
    m.flatten = function (n, t) {
        return S(n, t, !1)
    }, m.without = function (n) {
        return m.difference(n, l.call(arguments, 1))
    }, m.uniq = m.unique = function (n, t, r, e) {
        m.isBoolean(t) || (e = r, r = t, t = !1), null != r && (r = x(r, e));
        for (var u = [], i = [], o = 0, a = O(n); a > o; o++) {
            var c = n[o], f = r ? r(c, o, n) : c;
            t ? (o && i === f || u.push(c), i = f) : r ? m.contains(i, f) || (i.push(f), u.push(c)) : m.contains(u, c) || u.push(c)
        }
        return u
    }, m.union = function () {
        return m.uniq(S(arguments, !0, !0))
    }, m.intersection = function (n) {
        for (var t = [], r = arguments.length, e = 0, u = O(n); u > e; e++) {
            var i = n[e];
            if (!m.contains(t, i)) {
                for (var o = 1; r > o && m.contains(arguments[o], i); o++);
                o === r && t.push(i)
            }
        }
        return t
    }, m.difference = function (n) {
        var t = S(arguments, !0, !0, 1);
        return m.filter(n, function (n) {
            return !m.contains(t, n)
        })
    }, m.zip = function () {
        return m.unzip(arguments)
    }, m.unzip = function (n) {
        for (var t = n && m.max(n, O).length || 0, r = Array(t), e = 0; t > e; e++)r[e] = m.pluck(n, e);
        return r
    }, m.object = function (n, t) {
        for (var r = {}, e = 0, u = O(n); u > e; e++)t ? r[n[e]] = t[e] : r[n[e][0]] = n[e][1];
        return r
    }, m.findIndex = t(1), m.findLastIndex = t(-1), m.sortedIndex = function (n, t, r, e) {
        r = x(r, e, 1);
        for (var u = r(t), i = 0, o = O(n); o > i;) {
            var a = Math.floor((i + o) / 2);
            r(n[a]) < u ? i = a + 1 : o = a
        }
        return i
    }, m.indexOf = r(1, m.findIndex, m.sortedIndex), m.lastIndexOf = r(-1, m.findLastIndex), m.range = function (n, t, r) {
        null == t && (t = n || 0, n = 0), r = r || 1;
        for (var e = Math.max(Math.ceil((t - n) / r), 0), u = Array(e), i = 0; e > i; i++, n += r)u[i] = n;
        return u
    };
    var E = function (n, t, r, e, u) {
        if (!(e instanceof t))return n.apply(r, u);
        var i = j(n.prototype), o = n.apply(i, u);
        return m.isObject(o) ? o : i
    };
    m.bind = function (n, t) {
        if (g && n.bind === g)return g.apply(n, l.call(arguments, 1));
        if (!m.isFunction(n))throw new TypeError("Bind must be called on a function");
        var r = l.call(arguments, 2), e = function () {
            return E(n, e, t, this, r.concat(l.call(arguments)))
        };
        return e
    }, m.partial = function (n) {
        var t = l.call(arguments, 1), r = function () {
            for (var e = 0, u = t.length, i = Array(u), o = 0; u > o; o++)i[o] = t[o] === m ? arguments[e++] : t[o];
            for (; e < arguments.length;)i.push(arguments[e++]);
            return E(n, r, this, this, i)
        };
        return r
    }, m.bindAll = function (n) {
        var t, r, e = arguments.length;
        if (1 >= e)throw new Error("bindAll must be passed function names");
        for (t = 1; e > t; t++)r = arguments[t], n[r] = m.bind(n[r], n);
        return n
    }, m.memoize = function (n, t) {
        var r = function (e) {
            var u = r.cache, i = "" + (t ? t.apply(this, arguments) : e);
            return m.has(u, i) || (u[i] = n.apply(this, arguments)), u[i]
        };
        return r.cache = {}, r
    }, m.delay = function (n, t) {
        var r = l.call(arguments, 2);
        return setTimeout(function () {
            return n.apply(null, r)
        }, t)
    }, m.defer = m.partial(m.delay, m, 1), m.throttle = function (n, t, r) {
        var e, u, i, o = null, a = 0;
        r || (r = {});
        var c = function () {
            a = r.leading === !1 ? 0 : m.now(), o = null, i = n.apply(e, u), o || (e = u = null)
        };
        return function () {
            var f = m.now();
            a || r.leading !== !1 || (a = f);
            var l = t - (f - a);
            return e = this, u = arguments, 0 >= l || l > t ? (o && (clearTimeout(o), o = null), a = f, i = n.apply(e, u), o || (e = u = null)) : o || r.trailing === !1 || (o = setTimeout(c, l)), i
        }
    }, m.debounce = function (n, t, r) {
        var e, u, i, o, a, c = function () {
            var f = m.now() - o;
            t > f && f >= 0 ? e = setTimeout(c, t - f) : (e = null, r || (a = n.apply(i, u), e || (i = u = null)))
        };
        return function () {
            i = this, u = arguments, o = m.now();
            var f = r && !e;
            return e || (e = setTimeout(c, t)), f && (a = n.apply(i, u), i = u = null), a
        }
    }, m.wrap = function (n, t) {
        return m.partial(t, n)
    }, m.negate = function (n) {
        return function () {
            return !n.apply(this, arguments)
        }
    }, m.compose = function () {
        var n = arguments, t = n.length - 1;
        return function () {
            for (var r = t, e = n[t].apply(this, arguments); r--;)e = n[r].call(this, e);
            return e
        }
    }, m.after = function (n, t) {
        return function () {
            return --n < 1 ? t.apply(this, arguments) : void 0
        }
    }, m.before = function (n, t) {
        var r;
        return function () {
            return --n > 0 && (r = t.apply(this, arguments)), 1 >= n && (t = null), r
        }
    }, m.once = m.partial(m.before, 2);
    var M = !{toString: null}.propertyIsEnumerable("toString"), I = ["valueOf", "isPrototypeOf", "toString", "propertyIsEnumerable", "hasOwnProperty", "toLocaleString"];
    m.keys = function (n) {
        if (!m.isObject(n))return [];
        if (v)return v(n);
        var t = [];
        for (var r in n)m.has(n, r) && t.push(r);
        return M && e(n, t), t
    }, m.allKeys = function (n) {
        if (!m.isObject(n))return [];
        var t = [];
        for (var r in n)t.push(r);
        return M && e(n, t), t
    }, m.values = function (n) {
        for (var t = m.keys(n), r = t.length, e = Array(r), u = 0; r > u; u++)e[u] = n[t[u]];
        return e
    }, m.mapObject = function (n, t, r) {
        t = x(t, r);
        for (var e, u = m.keys(n), i = u.length, o = {}, a = 0; i > a; a++)e = u[a], o[e] = t(n[e], e, n);
        return o
    }, m.pairs = function (n) {
        for (var t = m.keys(n), r = t.length, e = Array(r), u = 0; r > u; u++)e[u] = [t[u], n[t[u]]];
        return e
    }, m.invert = function (n) {
        for (var t = {}, r = m.keys(n), e = 0, u = r.length; u > e; e++)t[n[r[e]]] = r[e];
        return t
    }, m.functions = m.methods = function (n) {
        var t = [];
        for (var r in n)m.isFunction(n[r]) && t.push(r);
        return t.sort()
    }, m.extend = _(m.allKeys), m.extendOwn = m.assign = _(m.keys), m.findKey = function (n, t, r) {
        t = x(t, r);
        for (var e, u = m.keys(n), i = 0, o = u.length; o > i; i++)if (e = u[i], t(n[e], e, n))return e
    }, m.pick = function (n, t, r) {
        var e, u, i = {}, o = n;
        if (null == o)return i;
        m.isFunction(t) ? (u = m.allKeys(o), e = b(t, r)) : (u = S(arguments, !1, !1, 1), e = function (n, t, r) {
                return t in r
            }, o = Object(o));
        for (var a = 0, c = u.length; c > a; a++) {
            var f = u[a], l = o[f];
            e(l, f, o) && (i[f] = l)
        }
        return i
    }, m.omit = function (n, t, r) {
        if (m.isFunction(t)) t = m.negate(t); else {
            var e = m.map(S(arguments, !1, !1, 1), String);
            t = function (n, t) {
                return !m.contains(e, t)
            }
        }
        return m.pick(n, t, r)
    }, m.defaults = _(m.allKeys, !0), m.create = function (n, t) {
        var r = j(n);
        return t && m.extendOwn(r, t), r
    }, m.clone = function (n) {
        return m.isObject(n) ? m.isArray(n) ? n.slice() : m.extend({}, n) : n
    }, m.tap = function (n, t) {
        return t(n), n
    }, m.isMatch = function (n, t) {
        var r = m.keys(t), e = r.length;
        if (null == n)return !e;
        for (var u = Object(n), i = 0; e > i; i++) {
            var o = r[i];
            if (t[o] !== u[o] || !(o in u))return !1
        }
        return !0
    };
    var N = function (n, t, r, e) {
        if (n === t)return 0 !== n || 1 / n === 1 / t;
        if (null == n || null == t)return n === t;
        n instanceof m && (n = n._wrapped), t instanceof m && (t = t._wrapped);
        var u = s.call(n);
        if (u !== s.call(t))return !1;
        switch (u) {
            case"[object RegExp]":
            case"[object String]":
                return "" + n == "" + t;
            case"[object Number]":
                return +n !== +n ? +t !== +t : 0 === +n ? 1 / +n === 1 / t : +n === +t;
            case"[object Date]":
            case"[object Boolean]":
                return +n === +t
        }
        var i = "[object Array]" === u;
        if (!i) {
            if ("object" != typeof n || "object" != typeof t)return !1;
            var o = n.constructor, a = t.constructor;
            if (o !== a && !(m.isFunction(o) && o instanceof o && m.isFunction(a) && a instanceof a) && "constructor" in n && "constructor" in t)return !1
        }
        r = r || [], e = e || [];
        for (var c = r.length; c--;)if (r[c] === n)return e[c] === t;
        if (r.push(n), e.push(t), i) {
            if (c = n.length, c !== t.length)return !1;
            for (; c--;)if (!N(n[c], t[c], r, e))return !1
        } else {
            var f, l = m.keys(n);
            if (c = l.length, m.keys(t).length !== c)return !1;
            for (; c--;)if (f = l[c], !m.has(t, f) || !N(n[f], t[f], r, e))return !1
        }
        return r.pop(), e.pop(), !0
    };
    m.isEqual = function (n, t) {
        return N(n, t)
    }, m.isEmpty = function (n) {
        return null == n ? !0 : k(n) && (m.isArray(n) || m.isString(n) || m.isArguments(n)) ? 0 === n.length : 0 === m.keys(n).length
    }, m.isElement = function (n) {
        return !(!n || 1 !== n.nodeType)
    }, m.isArray = h || function (n) {
            return "[object Array]" === s.call(n)
        }, m.isObject = function (n) {
        var t = typeof n;
        return "function" === t || "object" === t && !!n
    }, m.each(["Arguments", "Function", "String", "Number", "Date", "RegExp", "Error"], function (n) {
        m["is" + n] = function (t) {
            return s.call(t) === "[object " + n + "]"
        }
    }), m.isArguments(arguments) || (m.isArguments = function (n) {
        return m.has(n, "callee")
    }), "function" != typeof/./ && "object" != typeof Int8Array && (m.isFunction = function (n) {
        return "function" == typeof n || !1
    }), m.isFinite = function (n) {
        return isFinite(n) && !isNaN(parseFloat(n))
    }, m.isNaN = function (n) {
        return m.isNumber(n) && n !== +n
    }, m.isBoolean = function (n) {
        return n === !0 || n === !1 || "[object Boolean]" === s.call(n)
    }, m.isNull = function (n) {
        return null === n
    }, m.isUndefined = function (n) {
        return n === void 0
    }, m.has = function (n, t) {
        return null != n && p.call(n, t)
    }, m.noConflict = function () {
        return u._ = i, this
    }, m.identity = function (n) {
        return n
    }, m.constant = function (n) {
        return function () {
            return n
        }
    }, m.noop = function () {
    }, m.property = w, m.propertyOf = function (n) {
        return null == n ? function () {
            } : function (t) {
                return n[t]
            }
    }, m.matcher = m.matches = function (n) {
        return n = m.extendOwn({}, n), function (t) {
            return m.isMatch(t, n)
        }
    }, m.times = function (n, t, r) {
        var e = Array(Math.max(0, n));
        t = b(t, r, 1);
        for (var u = 0; n > u; u++)e[u] = t(u);
        return e
    }, m.random = function (n, t) {
        return null == t && (t = n, n = 0), n + Math.floor(Math.random() * (t - n + 1))
    }, m.now = Date.now || function () {
            return (new Date).getTime()
        };
    var B = {
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#x27;",
        "`": "&#x60;"
    }, T = m.invert(B), R = function (n) {
        var t = function (t) {
            return n[t]
        }, r = "(?:" + m.keys(n).join("|") + ")", e = RegExp(r), u = RegExp(r, "g");
        return function (n) {
            return n = null == n ? "" : "" + n, e.test(n) ? n.replace(u, t) : n
        }
    };
    m.escape = R(B), m.unescape = R(T), m.result = function (n, t, r) {
        var e = null == n ? void 0 : n[t];
        return e === void 0 && (e = r), m.isFunction(e) ? e.call(n) : e
    };
    var q = 0;
    m.uniqueId = function (n) {
        var t = ++q + "";
        return n ? n + t : t
    }, m.templateSettings = {evaluate: /<%([\s\S]+?)%>/g, interpolate: /<%=([\s\S]+?)%>/g, escape: /<%-([\s\S]+?)%>/g};
    var K = /(.)^/, z = {
        "'": "'",
        "\\": "\\",
        "\r": "r",
        "\n": "n",
        "\u2028": "u2028",
        "\u2029": "u2029"
    }, D = /\\|'|\r|\n|\u2028|\u2029/g, L = function (n) {
        return "\\" + z[n]
    };
    m.template = function (n, t, r) {
        !t && r && (t = r), t = m.defaults({}, t, m.templateSettings);
        var e = RegExp([(t.escape || K).source, (t.interpolate || K).source, (t.evaluate || K).source].join("|") + "|$", "g"), u = 0, i = "__p+='";
        n.replace(e, function (t, r, e, o, a) {
            return i += n.slice(u, a).replace(D, L), u = a + t.length, r ? i += "'+\n((__t=(" + r + "))==null?'':_.escape(__t))+\n'" : e ? i += "'+\n((__t=(" + e + "))==null?'':__t)+\n'" : o && (i += "';\n" + o + "\n__p+='"), t
        }), i += "';\n", t.variable || (i = "with(obj||{}){\n" + i + "}\n"), i = "var __t,__p='',__j=Array.prototype.join," + "print=function(){__p+=__j.call(arguments,'');};\n" + i + "return __p;\n";
        try {
            var o = new Function(t.variable || "obj", "_", i)
        } catch (a) {
            throw a.source = i, a
        }
        var c = function (n) {
            return o.call(this, n, m)
        }, f = t.variable || "obj";
        return c.source = "function(" + f + "){\n" + i + "}", c
    }, m.chain = function (n) {
        var t = m(n);
        return t._chain = !0, t
    };
    var P = function (n, t) {
        return n._chain ? m(t).chain() : t
    };
    m.mixin = function (n) {
        m.each(m.functions(n), function (t) {
            var r = m[t] = n[t];
            m.prototype[t] = function () {
                var n = [this._wrapped];
                return f.apply(n, arguments), P(this, r.apply(m, n))
            }
        })
    }, m.mixin(m), m.each(["pop", "push", "reverse", "shift", "sort", "splice", "unshift"], function (n) {
        var t = o[n];
        m.prototype[n] = function () {
            var r = this._wrapped;
            return t.apply(r, arguments), "shift" !== n && "splice" !== n || 0 !== r.length || delete r[0], P(this, r)
        }
    }), m.each(["concat", "join", "slice"], function (n) {
        var t = o[n];
        m.prototype[n] = function () {
            return P(this, t.apply(this._wrapped, arguments))
        }
    }), m.prototype.value = function () {
        return this._wrapped
    }, m.prototype.valueOf = m.prototype.toJSON = m.prototype.value, m.prototype.toString = function () {
        return "" + this._wrapped
    }, "function" == typeof define && define.amd && define("underscore", [], function () {
        return m
    })
}).call(this);


$(function () {
    $(".user-dropdown").html(GetUserDropDownHtml());
    $(".user-panel").html(GetUserBlockHtml());
    $(".main-menu").html(GetSideMenuHtml());
    $(".sidebar-fix-bottom").html(GetSidebarHtml());
    $(".user-block").append('<select class="form-control" id="languageChange" style="width: 100px;margin-left:6px;  display: inline; margin-top: 8px;"><option value="cn">中文</option><option value="en">English</option></select>');
    $('.brand').html('<img src="/images/logo.jpg" style="height: 50px"></img><span class="brand-name">心爱网</span>')
    BindLanguageFunc();

    if ($.cookie('language_Option') == "english") {
        transEnglish();
        $("#languageChange").val("en")
        BindLanguageFunc();
    }

    if (location.href.substr(location.href.lastIndexOf('/') + 1) == "index.html" || !location.href.substr(location.href.lastIndexOf('/') + 1)) {
        $($('.smart-widget-header')[0]).remove();

        function InitMemTrees() {

            var html = '<ol class="dd-list"><li class="dd-item"> <div class="dd-handle">依次表示账号-等级-推荐人数-业绩-激活日期</div> </li>';

            function InitTree(memlist) {
                var treehtml = '';
                for (var i = 0; i < memlist.length; i++) {
                    var listhtml = '';
                    if (memlist[i].list.length > 0) {
                        listhtml = '<ol class="dd-list" style="display: block;">' + InitTree(memlist[i].list) + '</ol>';
                    }
                    treehtml += '<li class="dd-item"><div class="dd-handle">' + (memlist[i].list.length > 0 ? '<span class="hassubitem" style="color: red;margin-right: 5px;">+</span>' : '') + memlist[i].name + '</div>' + listhtml + '</li>';
                }

                return treehtml;
            }

            html += InitTree(__memList);
            html += '</ol>'
            $('#nestable').html(html)
        }

        InitMemTrees();

        $('.dd-handle').click(function () {
            if ($(this).next().attr('class') == "dd-list") {
                $(this).next().toggle()
            }
        })
    }

})
function BindLanguageFunc() {
    $("#languageChange").on('change', function () {
        if ($(this).val() == "en") {
            $.cookie('language_Option', 'english', {expires: 7});
            location.reload()
        }
        else {
            $.cookie('language_Option', 'chinese', {expires: 7});
            location.reload()
        }
    });
}
function GetUserBlockHtml() {
    var list = [{
        "href": "ziliaoxiugai.html", "class": "fa fa-edit fa-lg", "title": "资料修改"
    }, {
        "href": "mimaxiugai.html", "class": "fa fa-inbox fa-lg", "title": "密码修改"
    }, {
        "href": "jiaoyimima.html", "class": "fa fa-edit fa-lg", "title": "交易密码"
    }, {
        "href": "signin.html", "class": "fa fa-power-off fa-lg", "title": "退出"
    }];

    var html = '<div class="panel-body paddingTB-sm"><ul>';
    for (var i = 0; i < list.length; i++) {
        var item = list[i];
        html += '<li><a href="' + item.href + '"><i class="' + item.class + '"></i><span class="m-left-xs">' + item.title + '</span></a></li>';
    }
    html += '</ul></div>';

    return html;
};

function GetSideMenuHtml() {
    var list = [{
        "class": "bg-palette1",
        "class2": "block fa fa-home fa-lg",
        "href": "index.html",
        "title": "首页",
        "subtitle": "首页",
        "submenu": null

    }, {
        "class": "bg-palette2",
        "class2": "block fa fa-desktop fa-lg",
        "href": "tuiguang.html",
        "title": "推广信息",
        "subtitle": "推广",
        "submenu": null

    }, {
        "class": "openable bg-palette3",
        "class2": "block fa fa-list fa-lg",
        "href": "#",
        "title": "钱包管理",
        "subtitle": "钱包",
        "submenu": {
            "class": "submenu bg-palette4", "list": [{"title": "会员等级提升", "href": "memlevelup.html"},
                {"title": "会员转账", "href": "memtrans.html"}, {"title": "会员明细", "href": "memdetail.html"}]
        }

    },
        {
            "class": "bg-palette4",
            "class2": "block fa fa-tags fa-lg",
            "href": "tixian.html",
            "title": "提现管理",
            "subtitle": "提现",
            "submenu": null

        },
        {
            "class": "bg-palette1",
            "class2": "block fa fa-envelope fa-lg",
            "href": "huikuan.html",
            "title": "汇款管理",
            "subtitle": "汇款",
            "submenu": null

        }, {
            "class": "bg-palette2 openable",
            "class2": "block fa fa-clock-o fa-lg",
            "href": "#",
            "title": "信息管理",
            "subtitle": "信息",
            "submenu": {
                "class": "submenu bg-palette4", "list": [{"title": "收件箱", "href": "xinxi.html"},
                    {"title": "写邮件", "href": "xieyoujian.html"}]
            }

        }, {
            "class": "openable bg-palette3",
            "class2": "block fa fa-list fa-lg",
            "href": "#",
            "title": "个人信息管理",
            "subtitle": "管理",
            "submenu": {
                "class": "submenu bg-palette4", "list": [{"title": "资料修改", "href": "ziliaoxiugai.html"},
                    {"title": "密码修改", "href": "mimaxiugai.html"}, {"title": "交易密码", "href": "jiaoyimima.html"}]
            }

        }];

    var html = ' <ul class="accordion"><li class="menu-header">管理菜单</li>';
    var submenuhtml = function (submenu) {
        var subhtml = '<ul class="submenu bg-palette4" style="display: none;">'
        for (var j = 0; j < submenu.list.length; j++) {
            var subitem = submenu.list[j];
            subhtml += '<li><a href="' + subitem.href + '"><span class="submenu-label">' + subitem.title + '</span></a></li>'
        }
        subhtml += '</ul>'
        return subhtml;
    }

    for (var i = 0; i < list.length; i++) {
        var item = list[i];
        var pagename = location.href.substr(location.href.lastIndexOf('/') + 1);

        html += '<li class="' + item.class + (pagename == item.href ? " active" : "") + '"><a href="' + item.href + '"><span class="menu-content block"><span class="menu-icon"><i class="' + item.class2 + '"></i></span><span class="text m-left-sm">' + item.title + '</span>' + (item.submenu ? '<span class="submenu-icon"></span>' : '') + '</span><span class="menu-content-hover block">' + item.subtitle + ' </span></a>' + (item.submenu ? submenuhtml(item.submenu) : "") +
            '</li>';
    }

    html += '<li class="menu-header">Others</li></ul>';

    return html


};

function GetSidebarHtml() {
    var list = [{
        "href": "ziliaoxiugai.html", "class": "fa fa-edit fa-lg", "title": "资料修改"
    }, {
        "href": "mimaxiugai.html", "class": "fa fa-inbox fa-lg", "title": "密码修改"
    }, {
        "href": "jiaoyimima.html", "class": "fa fa-edit fa-lg", "title": "交易密码"
    }, {
        "href": "signin.html", "class": "fa fa-power-off fa-lg", "title": "退出"
    }];

    var html = '<div class="user-dropdown dropup pull-left"><a href="#" class="dropdwon-toggle font-18" data-toggle="dropdown"><i class="ion-person-add"></i></a><ul class="dropdown-menu">';
    for (var i = 0; i < list.length; i++) {
        var item = list[i];
        html += '<li><a href="' + item.href + '">' + item.title + '</a></li>';
    }
    html += '<li class="divider"></li></ul> </div><a href="lockscreen.html" class="pull-right font-18"><i class="ion-log-out"></i></a>';

    return html;
};

function GetUserDropDownHtml() {
    var list = [{
        "href": "ziliaoxiugai.html", "class": "fa fa-edit fa-lg", "title": "资料修改"
    }, {
        "href": "mimaxiugai.html", "class": "fa fa-inbox fa-lg", "title": "密码修改"
    }, {
        "href": "jiaoyimima.html", "class": "fa fa-edit fa-lg", "title": "交易密码"
    }, {
        "href": "signin.html", "class": "fa fa-power-off fa-lg", "title": "退出"
    }];

    var html = '<li class="user-avatar"><img src="images/profile/profile1.jpg" alt="" class="img-circle"><div class="user-content"><h5 class="no-m-bottom">Jane Doe</h5><div class="m-top-xs"><a href="signin.html">Log out</a></div></div></li><li>';
    for (var i = 0; i < list.length; i++) {
        var item = list[i];
        html += '<li><a href="' + item.href + '">' + item.title + '</a></li>';
    }
    return html;
};

function transEnglish() {

    var transLists = _.union(HuiKuanPageTransList(), IndexPageTransList(), SideMenuTransList(), JiaoyimimaTransList(), memDetailTransList(), memlevelupTransList(), memTransTransList(), tuiguangTransList(), ziliaoxiugaiTransList(), tixianTransList(), xinxiTransList()).sort(function (a, b) {
        return a.chinese.length < b.chinese.length
    })

    var dochtml = $(".preload").html();

    for (var i = 0; i < transLists.length; i++) {
        var item = transLists[i];
        dochtml = dochtml.replace(new RegExp(item.chinese, "gm"), item.english)
    }
    $(".preload").html(dochtml);

}

function SideMenuTransList() {
    return [
        {"chinese": "资料修改", "english": "Data modification"},
        {"chinese": "交易密码", "english": "Change the transaction"},
        {"chinese": "密码修改", "english": "change Password"},
        {"chinese": "退出", "english": "Sign out"},
        {"chinese": "首页", "english": "Home"},
        {"chinese": "推广信息", "english": "Promotion information"},
        {"chinese": "推广", "english": "Promotion"},
        {"chinese": "钱包管理", "english": "Wallet management"},
        {"chinese": "钱包", "english": "wallet"},
        {"chinese": "会员等级提升", "english": "Mem Levelup"},
        {"chinese": "会员转账", "english": "Mem Trans"},
        {"chinese": "会员明细", "english": "Mem Detail"},
        {"chinese": "提现管理", "english": "Mention Manage"},
        {"chinese": "提现", "english": "Mention"},
        {"chinese": "汇款管理", "english": "Remittance"},
        {"chinese": "个人信息管理", "english": "Persional Info"},
        {"chinese": "信息管理", "english": "Info"},
        {"chinese": "信息", "english": "Message"},
        {"chinese": "管理菜单", "english": "Manage"},
        {"chinese": "管理", "english": "Manage"},
        {"chinese": "级别", "english": "Level"},
        {"chinese": "业绩", "english": "Score"},
    ]
};

function HuiKuanPageTransList() {
    return [
        {
            "chinese": "汇款人姓名必须与账户实名认证姓名一致，姓名不一致的请联系客服并提供汇款证明，我们会在3-5个工作日内退款",
            "english": "The name of the remitter must be the same as the name of the account. If the name is inconsistent, please contact customer service and provide proof of remittance. We will refund within 3-5 business days"
        },
        {
            "chinese": "充值免收手续费，系统收到您的汇款后20分钟内入账，请耐心等待",
            "english": "Recharge the fee, the system received your remittance within 20 minutes recorded, please be patient"
        },
        {
            "chinese": "由于周末部分银行不提供汇款到账业务，导致用户充值不能及时到账。建议周末（周五17:00至周一09:00）请尽量避免使用：工商银行、农业银行、建设银行、交通银行、中国银行、民生银行等银行卡进行汇款，否则可能会延迟至周一到账",
            "english": "Due to the weekend part of the bank does not provide remittance to account business, resulting in the user recharge can not arrive in time. Recommended weekends (Friday 17:00 to Monday 09:00) Please try to avoid the use of: Industrial and Commercial Bank, Agricultural Bank, Construction Bank, Bank of Communications, Bank of China, Minsheng Bank and other bank cards for remittance, or may be delayed until Monday"
        },
        {"chinese": "充值不到账请联系客服", "english": "Please contact customer service"},
        {
            "chinese": "请严格按照汇款金额汇款，汇款金额的后2位是为了保证即时到账系统能自动分配的",
            "english": "Please pay in strict accordance with the remittance amount, the remittance amount of the last two is to ensure that the immediate account system can be automatically assigned"
        },
        {
            "chinese": "严禁电信诈骗分子利用平台进行洗钱，爱心平台已与有关部门建立联动机制，将采取各种措施，坚决打击各种犯罪活动，请勿以身试法",
            "english": "It is strictly forbidden to use the platform for money laundering, the platform has been linked with the relevant departments to establish a linkage mechanism, will take various measures to resolutely crack down on various criminal activities"
        },
        {"chinese": "心爱", "english": "LOVE"},
        {"chinese": "网", "english": "Site"},
        {"chinese": "首页", "english": "Home"},
        {"chinese": "汇款管理", "english": "Remittance management"},
        {"chinese": "汇款须知", "english": "Remittance notes"},
        {"chinese": "汇款操作", "english": "Remittance operation"},
        {"chinese": "汇款银行", "english": "Remittance bank"},
        {"chinese": "金额", "english": "Amount of money"},
        {"chinese": "汇款人", "english": "The remitter"},
        {"chinese": "交易密码", "english": "transaction password"},
        {"chinese": "手机验证码", "english": "Phone verification code"},
        {"chinese": "发送验证码", "english": "Send the verification code"},
        {"chinese": "提现", "english": "withdraw"}];

};

function IndexPageTransList() {
    return [{"chinese": "心爱网", "english": "LOVESite"},
        {"chinese": "首页", "english": "Home"},
        {"chinese": "林洋", "english": "LinYang"},
        {"chinese": "欢迎您，尊贵的会员", "english": "Welcome, distinguished members"},
        {"chinese": "绍兴", "english": "ShaoXing"},
        {"chinese": "本金钱包", "english": "Cash purse"},
        {"chinese": "消费钱包", "english": "Consumption wallet"},
        {"chinese": "保险钱包", "english": "Insurance wallet"},
        {"chinese": "退本钱包", "english": "Refund the wallet"},
        {"chinese": "冻结钱包", "english": "Freeze wallet"},
        {"chinese": "股权钱包", "english": "Equity wallet"},
        {"chinese": "您的本周收益增长", "english": "Your earnings growth this week"},
        {"chinese": "增长了", "english": "Grew up"},
        {"chinese": "静态分配", "english": "Static allocation"},
        {"chinese": "动态分配", "english": "Dynamic allocation"},
        {"chinese": "本金", "english": "principal"},
        {"chinese": "收益", "english": "income"},
        {"chinese": "盈利", "english": "profit"},

    ]

}

function JiaoyimimaTransList() {
    return [{"chinese": "首页", "english": "Home"},
        {"chinese": "个人信息管理", "english": "Personal information management"},
        {"chinese": "交易密码", "english": "Change the transaction password"},
        {"chinese": "请输入您的旧密码", "english": "Please enter your old password"},
        {"chinese": "旧密码", "english": "old password"},

        {"chinese": "请输入您的新密码", "english": "Please enter your new password"},
        {"chinese": "新密码", "english": "new password"},

        {"chinese": "请再次输入您的确认密码", "english": "Please enter your new password again"},
        {"chinese": "确认密码", "english": "confirm password"},

        {"chinese": "确定", "english": "OK"},
    ];
}

function memDetailTransList() {
    return [{"chinese": "首页", "english": "Home"},
        {"chinese": "钱包管理", "english": "Wallet management"},
        {"chinese": "钱包明细", "english": "Wallet detail"},
        {"chinese": "编号", "english": "Numbering"},
        {"chinese": "会员名", "english": "memberName"},
        {"chinese": "金额", "english": "Amount of money"},
        {"chinese": "本利金额", "english": "Profit Amount"},
        {"chinese": "消费金额", "english": "Customer Amount"},
        {"chinese": "股权金额", "english": "Equity amount"},
        {"chinese": "保险金额", "english": "Insurance amount"},
        {"chinese": "说明", "english": "Description"},
        {"chinese": "操作时间", "english": "Operating time"},
    ];
}

function memlevelupTransList() {
    return [{"chinese": "首页", "english": "Home"},
        {"chinese": "钱包管理", "english": "Wallet management"},
        {"chinese": "会员等级提升", "english": "Member Levelup"},
        {"chinese": "会员等级", "english": "Member Level"},
        {"chinese": "交易密码", "english": "Trade Password"},
        {"chinese": "确定", "english": "OK"},
        {"chinese": "镇代理", "english": "Town agent"},
        {"chinese": "区代理", "english": "District agent"},
        {"chinese": "县代理", "english": "County agent"},
        {"chinese": "市代理", "english": "City agent"},
        {"chinese": "省代理", "english": "Provincial agent"},
    ];
}

function memTransTransList() {
    return [{"chinese": "首页", "english": "Home"},
        {"chinese": "钱包管理", "english": "Wallet management"},
        {"chinese": "会员转账", "english": "Member Trans"},
        {"chinese": "消费钱包", "english": "Consumption wallet"},
        {"chinese": "转账金额", "english": "transfer amount"},
        {"chinese": "接受会员", "english": "Accept the member"},
        {"chinese": "交易密码", "english": "transaction password"},
        {"chinese": "确定", "english": "OK"},
    ];
}

function tuiguangTransList() {
    return [{"chinese": "首页", "english": "Home"},
        {"chinese": "推广", "english": "Promotion"},
        {"chinese": "推广图片", "english": "Promote pictures"},
        {"chinese": "推广二维码", "english": "Promote two-dimensional code"},
        {"chinese": "收款二维码", "english": "Received two-dimensional code"},
    ];
}

function ziliaoxiugaiTransList() {
    return [{"chinese": "首页", "english": "Home"},
        {"chinese": "个人信息管理", "english": "PersonInfo"},
        {"chinese": "资料修改", "english": "Modify"},
        {"chinese": "账号", "english": "Account"},
        {"chinese": "姓名", "english": "userName"},
        {"chinese": "会员等级", "english": "Member Level"},
        {"chinese": "推荐人", "english": "Recommended person"},
        {"chinese": "注册时间", "english": "Registration time"},
        {"chinese": "性别", "english": "Sex"},
        {"chinese": "收货地址", "english": "Shipping address"},
        {"chinese": "收货人", "english": "Shipping Person"},
        {"chinese": "身份证", "english": "ID Card"},
        {"chinese": "手机", "english": "Mobile"},
        {"chinese": "银行", "english": "Bank"},
        {"chinese": "银行账号", "english": "Bank Account"},
        {"chinese": "支付宝账号", "english": "Alipay No"},
        {"chinese": "头像", "english": "Header"},
        {"chinese": "确定", "english": "OK"},

    ];
}

function tixianTransList() {
    return [{"chinese": "首页", "english": "Home"},
        {"chinese": "提现管理", "english": "Mention management"},
        {"chinese": "提现须知", "english": "Mention reminded"},
        {
            "chinese": "爱心平台提现银行卡账户名和支付宝姓名必须与您的实名认证姓名一致。",
            "english": "The name of the bank card and the name of the payment must be the same as your real name"
        },
        {
            "chinese": "人民币提现正常24小时到账，具体到账时间因收款银行略有不同节假日到账时间略有延迟。",
            "english": "RMB is normal 24 hours to arrive, the specific arrival time due to the collection bank slightly different holiday arrival time slightly delayed"
        },
        {
            "chinese": "提现收取手续费： 慈善基金5%，请仔细确认后在操作。",
            "english": "Check the fee: Charity Fund 5%, please carefully confirmed after the operation"
        },
        {"chinese": "提现时间", "english": "Timing time"},
        {
            "chinese": "工作日：9时到16时的提现申请当日到账；16时到次日9时的提现申请，在次日16时前到账。周末及法定节假日在提现申请后24小时到账。",
            "english": "Workday: 9:00 to 16:00 on the date of application to arrive; 16:00 to 9:00 the next day to apply, in the next day 16 o'clock before the account Weekends and legal holidays are accepted 24 hours after the application is made."
        },
        {
            "chinese": "根据国家反洗钱改革及保障客户资产安全，会对系统检测出的异常账户进行安全认证。如有疑问，请联系客服",
            "english": "According to the national anti-money laundering reform and the protection of customer asset security, the system will detect the abnormal account for safety certification. If you have any questions, please contact customer service"
        },
        {"chinese": "提现操作", "english": "mention the operation"},
        {"chinese": "钱包类型", "english": "Home"},
        {"chinese": "本利钱包余额", "english": "Wallet type"},
        {"chinese": "汇入银行", "english": "Bank"},
        {"chinese": "账号", "english": "Account"},
        {"chinese": "户主", "english": "User"},
        {"chinese": "金额", "english": "Amount"},
        {"chinese": "交易密码", "english": "Trade Password"},
        {"chinese": "手机验证码", "english": "mobile code"},
        {"chinese": "发送验证码", "english": "send code"},
        {"chinese": "提现", "english": "OK"},

    ];
}

function xinxiTransList() {
    return [{"chinese": "首页", "english": "Home"},

        {"chinese": "收件人", "english": "Receive Member"},
        {"chinese": "邮件标题", "english": "Email Title"},
        {"chinese": "请在法律规定范围内文明用语", "english": "Please use right word to connect to others"},


        {"chinese": "邮件正文", "english": "Email Content"},
        {"chinese": "写邮件", "english": "Write message"},
        {"chinese": "收件箱", "english": "SendBox"},
        {"chinese": "发件箱", "english": "ReceiveBox"},
        {"chinese": "作者", "english": "Authon"},
        {"chinese": "信息", "english": "Message"},
        {"chinese": "日期", "english": "Data"},
    ];
}
//获取滚动条高度和宽度
function getBodyScroll() {
    var cWidth = 0, cHeight = 0, sWidth = 0, sHeight = 0, top = 0, left = 0;
    if (document.compatMode == "BackCompat") {
        cWidth = document.body.clientWidth;
        cHeight = document.body.clientHeight;
        sWidth = document.body.scrollWidth;
        sHeight = document.body.scrollHeight;
        left = document.body.scrollLeft;
        top = document.body.scrollTop;
    }
    else { //document.compatMode == "CSS1Compat"
        cWidth = document.documentElement.clientWidth;
        cHeight = document.documentElement.clientHeight;
        sWidth = document.documentElement.scrollWidth;
        sHeight = document.documentElement.scrollHeight;
        left = document.documentElement.scrollLeft == 0 ? document.body.scrollLeft : document.documentElement.scrollLeft;
        top = document.documentElement.scrollTop == 0 ? document.body.scrollTop : document.documentElement.scrollTop;
    }
    return {cWidth: cWidth, cHeight: cHeight, sWidth: sWidth, sHeight: sHeight, top: top, left: left};
}

var hna = {}
//右侧栏
//weibo,weixin,service,top
hna.tools = {
    _default: 300,
    footer: null,
    init: function () {
        if ($(".hna-fixed-toolbar").length > 0) return;
        var TRANSITING = false, BOTTOM = 45, status = "OPENED";
        //从store中读取工具栏状态
        var hna_status = {fixed_tool: "OPENED"};
        if (hna_status && hna_status.fixed_tool) {
            status = hna_status.fixed_tool;
        } else {
            hna_status = hna_status || {};
            hna_status.fixed_tool = status;
        }
        var toolbar = $("<ul class='hna-fixed-toolbar'>"), footer = $("#footer-block"),
            //微信
            weixin = $("<li class='weixin'><a href='javascript:void(0);'></a><div><span class='saoma'>" + "微信二维码" + "</span><i></i></div></li>"),
            //微博
            weibo = $("<li class='weibo'><a href='http://weibo.com/gsair?s=6cm7D0' target='_blank'><img src='src/image/qqicon.jpg' style='height: 90%;margin-top: 3px;margin-left: 7px;background-color: beige;'></a><div class='desc' style='width: 200px;'>" + "QQ:88888888" + "</div></li>"),
            //人工
            serv = $("<li class='serv'><a href='javascript:void(0);'></a><div class='desc' style='width: 250px;'>" + "客服电话:027-88888888" + "</div></li>").on("click", function (e) {
            }),  //收起
            close = $("<li class='remove'><a href='javascript:void(0);'></a></li>").on("click", function (e) {
                hna.tools.footer = $(".footer");
                if (toolbar.hasClass("closed")) {
                    toolbar.removeClass("closed").animate({top: 200}, 500);
                    hna.tools.update("OPENED");
                } else {
                    var height = hna.tools.footer.offset().top - getBodyScroll().top;
                    var top = height - 53 + (hna.tools.footer.height() - BOTTOM);
                    TRANSITING = true;
                    toolbar.animate({height: 53, top: top}, Math.floor(height * 0.75), function () {
                        TRANSITING = false;
                        toolbar.css({top: hna.tools.calculate()});
                    }).addClass("closed");
                    hna.tools.update("CLOSED");
                }
            });

        $("body").append(toolbar.append(weixin, weibo, serv, close));
        if (status == "CLOSED") {
            toolbar.css({top: hna.tools.calculate()}).addClass("closed");
        }
        $(window).scroll(function () {
            var top = getBodyScroll().top || 0;
            if (top > hna.tools._default) {
            }
            if (toolbar.hasClass("closed")) {
                if (TRANSITING) return;
                toolbar.css({top: hna.tools.calculate()});
            }
        });
        //this.showSetUp(true);
    },
    update: function (status) {
        var hna_status = {};
        hna_status.fixed_tool = status;
    },
    calculate: function () {
        hna.tools.footer = $("#footer-block");
        if (hna.tools.footer.offset()) {
            return hna.tools.footer.offset().top - getBodyScroll().top - 53 + hna.tools.footer.height() - 45;
        }
        return getBodyScroll().sHeight - 100;
    }
};

hna.tools.init();