(()=>{var e={744:(e,t)=>{"use strict";t.Z=(e,t)=>{const r=e.__vccOpts||e;for(const[e,o]of t)r[e]=o;return r}},596:(e,t,r)=>{"use strict";r.d(t,{Z:()=>l});const o=Vue;var n={class:"flex items-center"},i=[(0,o.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"22",width:"22",stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",class:"fill-white"},[(0,o.createElementVNode)("circle",{cx:"12",cy:"12",r:"10"}),(0,o.createElementVNode)("polyline",{points:"8 12 12 16 16 12"}),(0,o.createElementVNode)("line",{x1:"12",x2:"12",y1:"8",y2:"16"})],-1)],s=[(0,o.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"22",width:"22",stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",class:"fill-white"},[(0,o.createElementVNode)("circle",{cx:"12",cy:"12",r:"10"}),(0,o.createElementVNode)("polyline",{points:"16 12 12 8 8 12"}),(0,o.createElementVNode)("line",{x1:"12",x2:"12",y1:"16",y2:"8"})],-1)];const c={props:["resourceName","field"],computed:{resourceId:function(){return this.$parent.resource.id.value},parentList:function(){return this.$parent.$parent.$parent.$parent.$parent.$parent}},methods:{reorderResource:function(e){var t=this;Nova.request().post("/nova-vendor/michielkempen/nova-order-field/".concat(this.resourceName),{direction:e,resource:this.resourceName,resourceId:this.resourceId,viaResource:this.field.viaResource||null,viaResourceId:this.field.viaResourceId||null,viaRelationship:this.field.viaRelationship||null}).then((function(){t.$toasted.show(t.__("The new order has been set!"),{type:"success"}),t.parentList.getResources()}))}}};const l=(0,r(744).Z)(c,[["render",function(e,t,r,c,l,a){return(0,o.openBlock)(),(0,o.createElementBlock)("div",n,[r.field.last?(0,o.createCommentVNode)("",!0):((0,o.openBlock)(),(0,o.createElementBlock)("button",{key:0,onClick:t[0]||(t[0]=function(e){return a.reorderResource("down")}),class:"cursor-pointer text-70 hover:text-primary mr-3"},i)),r.field.first?(0,o.createCommentVNode)("",!0):((0,o.openBlock)(),(0,o.createElementBlock)("button",{key:1,onClick:t[1]||(t[1]=function(e){return a.reorderResource("up")}),class:"cursor-pointer text-70 hover:text-primary"},s))])}]])}},t={};function r(o){var n=t[o];if(void 0!==n)return n.exports;var i=t[o]={exports:{}};return e[o](i,i.exports,r),i.exports}r.d=(e,t)=>{for(var o in t)r.o(t,o)&&!r.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),Nova.booting((function(e){Nova.inertia("IndexField",r(596).Z)}))})();