(()=>{var e={841:(e,t,r)=>{"use strict";r.d(t,{Z:()=>i});var n=r(645),o=r.n(n)()((function(e){return e[1]}));o.push([e.id,".fill-white[data-v-a0c744a0]{fill:#fff}",""]);const i=o},645:e=>{"use strict";e.exports=function(e){var t=[];return t.toString=function(){return this.map((function(t){var r=e(t);return t[2]?"@media ".concat(t[2]," {").concat(r,"}"):r})).join("")},t.i=function(e,r,n){"string"==typeof e&&(e=[[null,e,""]]);var o={};if(n)for(var i=0;i<this.length;i++){var c=this[i][0];null!=c&&(o[c]=!0)}for(var a=0;a<e.length;a++){var s=[].concat(e[a]);n&&o[s[0]]||(r&&(s[2]?s[2]="".concat(r," and ").concat(s[2]):s[2]=r),t.push(s))}},t}},379:(e,t,r)=>{"use strict";var n,o=function(){return void 0===n&&(n=Boolean(window&&document&&document.all&&!window.atob)),n},i=function(){var e={};return function(t){if(void 0===e[t]){var r=document.querySelector(t);if(window.HTMLIFrameElement&&r instanceof window.HTMLIFrameElement)try{r=r.contentDocument.head}catch(e){r=null}e[t]=r}return e[t]}}(),c=[];function a(e){for(var t=-1,r=0;r<c.length;r++)if(c[r].identifier===e){t=r;break}return t}function s(e,t){for(var r={},n=[],o=0;o<e.length;o++){var i=e[o],s=t.base?i[0]+t.base:i[0],l=r[s]||0,u="".concat(s," ").concat(l);r[s]=l+1;var d=a(u),f={css:i[1],media:i[2],sourceMap:i[3]};-1!==d?(c[d].references++,c[d].updater(f)):c.push({identifier:u,updater:m(f,t),references:1}),n.push(u)}return n}function l(e){var t=document.createElement("style"),n=e.attributes||{};if(void 0===n.nonce){var o=r.nc;o&&(n.nonce=o)}if(Object.keys(n).forEach((function(e){t.setAttribute(e,n[e])})),"function"==typeof e.insert)e.insert(t);else{var c=i(e.insert||"head");if(!c)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");c.appendChild(t)}return t}var u,d=(u=[],function(e,t){return u[e]=t,u.filter(Boolean).join("\n")});function f(e,t,r,n){var o=r?"":n.media?"@media ".concat(n.media," {").concat(n.css,"}"):n.css;if(e.styleSheet)e.styleSheet.cssText=d(t,o);else{var i=document.createTextNode(o),c=e.childNodes;c[t]&&e.removeChild(c[t]),c.length?e.insertBefore(i,c[t]):e.appendChild(i)}}function p(e,t,r){var n=r.css,o=r.media,i=r.sourceMap;if(o?e.setAttribute("media",o):e.removeAttribute("media"),i&&"undefined"!=typeof btoa&&(n+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(i))))," */")),e.styleSheet)e.styleSheet.cssText=n;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(n))}}var v=null,h=0;function m(e,t){var r,n,o;if(t.singleton){var i=h++;r=v||(v=l(t)),n=f.bind(null,r,i,!1),o=f.bind(null,r,i,!0)}else r=l(t),n=p.bind(null,r,t),o=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(r)};return n(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;n(e=t)}else o()}}e.exports=function(e,t){(t=t||{}).singleton||"boolean"==typeof t.singleton||(t.singleton=o());var r=s(e=e||[],t);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var n=0;n<r.length;n++){var o=a(r[n]);c[o].references--}for(var i=s(e,t),l=0;l<r.length;l++){var u=a(r[l]);0===c[u].references&&(c[u].updater(),c.splice(u,1))}r=i}}}},744:(e,t)=>{"use strict";t.Z=(e,t)=>{const r=e.__vccOpts||e;for(const[e,n]of t)r[e]=n;return r}},95:(e,t,r)=>{"use strict";r.d(t,{Z:()=>p});const n=Vue;var o=function(e){return(0,n.pushScopeId)("data-v-a0c744a0"),e=e(),(0,n.popScopeId)(),e},i={class:"flex items-center"},c=[o((function(){return(0,n.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"22",width:"22",stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",class:"fill-white"},[(0,n.createElementVNode)("circle",{cx:"12",cy:"12",r:"10"}),(0,n.createElementVNode)("polyline",{points:"8 12 12 16 16 12"}),(0,n.createElementVNode)("line",{x1:"12",x2:"12",y1:"8",y2:"16"})],-1)}))],a=[o((function(){return(0,n.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"22",width:"22",stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",class:"fill-white"},[(0,n.createElementVNode)("circle",{cx:"12",cy:"12",r:"10"}),(0,n.createElementVNode)("polyline",{points:"16 12 12 8 8 12"}),(0,n.createElementVNode)("line",{x1:"12",x2:"12",y1:"16",y2:"8"})],-1)}))];const s={props:["resourceName","field"],computed:{resourceId:function(){return this.$parent.resource.id.value},parentList:function(){return this.$parent.$parent.$parent.$parent.$parent.$parent}},methods:{reorderResource:function(e){var t=this;Nova.request().post("/nova-vendor/michielkempen/nova-order-field/".concat(this.resourceName),{direction:e,resource:this.resourceName,resourceId:this.resourceId,viaResource:this.field.viaResource||null,viaResourceId:this.field.viaResourceId||null,viaRelationship:this.field.viaRelationship||null}).then((function(){Nova.success(t.__("The new order has been set!")),t.parentList.getResources()}))}}};var l=r(379),u=r.n(l),d=r(841),f={insert:"head",singleton:!1};u()(d.Z,f);d.Z.locals;const p=(0,r(744).Z)(s,[["render",function(e,t,r,o,s,l){return(0,n.openBlock)(),(0,n.createElementBlock)("div",i,[r.field.last?(0,n.createCommentVNode)("",!0):((0,n.openBlock)(),(0,n.createElementBlock)("button",{key:0,onClick:t[0]||(t[0]=function(e){return l.reorderResource("down")}),class:"cursor-pointer text-70 hover:text-primary mr-3"},c)),r.field.first?(0,n.createCommentVNode)("",!0):((0,n.openBlock)(),(0,n.createElementBlock)("button",{key:1,onClick:t[1]||(t[1]=function(e){return l.reorderResource("up")}),class:"cursor-pointer text-70 hover:text-primary"},a))])}],["__scopeId","data-v-a0c744a0"]])}},t={};function r(n){var o=t[n];if(void 0!==o)return o.exports;var i=t[n]={id:n,exports:{}};return e[n](i,i.exports,r),i.exports}r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},r.d=(e,t)=>{for(var n in t)r.o(t,n)&&!r.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r.nc=void 0,Nova.booting((function(e,t){e.component("index-order-field",r(95).Z)}))})();