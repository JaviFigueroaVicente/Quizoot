import{u as _e,a as Ne,r as rt,o as hn,w as Me,b as Q,d as P,e as _,f as et,h as x,i as v,j as U,t as W,n as z,k as K,l as bn,F as B,m as Ct,v as yn,T as vn,p as ct,q as j,s as ee,S as xn,x as ne}from"./app-Cmxi_hcm.js";import{u as Te,N as An,s as kn,F as wn}from"./AppFooter-CVrLixa8.js";import{_ as Sn}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./forms-BzG83gw_.js";const Pn={key:0},En={key:0,class:"layout-menuitem-root-text"},Cn=["href","target"],On={class:"layout-menuitem-text"},In={key:0,class:"pi pi-fw pi-angle-down layout-submenu-toggler"},_n={class:"layout-menuitem-text"},Nn={key:0,class:"pi pi-fw pi-angle-down layout-submenu-toggler"},Mn={class:"layout-submenu"},Tn={__name:"AppMenuItem",props:{item:{type:Object,default:()=>({})},index:{type:Number,default:0},root:{type:Boolean,default:!0},parentItemKey:{type:String,default:null}},setup(t){const{can:e}=_e(),n=Ne(),{layoutConfig:a,layoutState:r,setActiveMenuItem:i,onMenuToggle:o}=Te(),s=t,m=rt(!1),c=rt(null);hn(()=>{c.value=s.parentItemKey?s.parentItemKey+"-"+s.index:String(s.index);const f=r.activeMenuItem;m.value=f===c.value||f?f.startsWith(c.value+"-"):!1}),Me(()=>a.activeMenuItem.value,f=>{m.value=f===c.value||f.startsWith(c.value+"-")});const d=(f,g)=>{if(g.disabled){f.preventDefault();return}const{overlayMenuActive:y,staticMenuMobileActive:k}=r;(g.to||g.url)&&(k.value||y.value)&&o(),g.command&&g.command({originalEvent:f,item:g});const p=g.items?m.value?s.parentItemKey:c:c.value;i(p)},h=f=>n.path===f.to;return(f,g)=>{const y=Q("router-link"),k=Q("app-menu-item",!0);return t.root||t.item.permision==="all"||et(e)(t.item.permision)?(x(),P("div",Pn,[v("li",{class:z({"layout-root-menuitem":t.root,"active-menuitem":m.value})},[t.root&&t.item.visible!==!1?(x(),P("div",En,W(t.item.label),1)):_("",!0),(!t.item.to||t.item.items)&&t.item.visible!==!1?(x(),P("a",{key:1,href:t.item.url,onClick:g[0]||(g[0]=p=>d(p,t.item,t.index)),class:z(t.item.class),target:t.item.target,tabindex:"0"},[v("i",{class:z([t.item.icon,"layout-menuitem-icon"])},null,2),v("span",On,W(t.item.label),1),t.item.items?(x(),P("i",In)):_("",!0)],10,Cn)):_("",!0),t.item.to&&!t.item.items&&t.item.visible!==!1?(x(),U(y,{key:2,onClick:g[1]||(g[1]=p=>d(p,t.item,t.index)),class:z([t.item.class,{"active-route":h(t.item)}]),tabindex:"0",to:t.item.to},{default:K(()=>[v("i",{class:z([t.item.icon,"layout-menuitem-icon"])},null,2),v("span",_n,W(t.item.label),1),t.item.items?(x(),P("i",Nn)):_("",!0)]),_:1},8,["class","to"])):_("",!0),t.item.items&&t.item.visible!==!1?(x(),U(vn,{key:3,name:"layout-submenu"},{default:K(()=>[bn(v("ul",Mn,[(x(!0),P(B,null,Ct(t.item.items,(p,w)=>(x(),U(k,{key:p,index:w,item:p,parentItemKey:c.value,root:!1},null,8,["index","item","parentItemKey"]))),128))],512),[[yn,t.root?!0:m.value]])]),_:1})):_("",!0)],2)])):_("",!0)}}};/*!
 * Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2024 Fonticons, Inc.
 */function Fn(t,e,n){return(e=Dn(e))in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function ae(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter(function(r){return Object.getOwnPropertyDescriptor(t,r).enumerable})),n.push.apply(n,a)}return n}function l(t){for(var e=1;e<arguments.length;e++){var n=arguments[e]!=null?arguments[e]:{};e%2?ae(Object(n),!0).forEach(function(a){Fn(t,a,n[a])}):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):ae(Object(n)).forEach(function(a){Object.defineProperty(t,a,Object.getOwnPropertyDescriptor(n,a))})}return t}function Ln(t,e){if(typeof t!="object"||!t)return t;var n=t[Symbol.toPrimitive];if(n!==void 0){var a=n.call(t,e);if(typeof a!="object")return a;throw new TypeError("@@toPrimitive must return a primitive value.")}return(e==="string"?String:Number)(t)}function Dn(t){var e=Ln(t,"string");return typeof e=="symbol"?e:e+""}const re=()=>{};let Ht={},Fe={},Le=null,De={mark:re,measure:re};try{typeof window<"u"&&(Ht=window),typeof document<"u"&&(Fe=document),typeof MutationObserver<"u"&&(Le=MutationObserver),typeof performance<"u"&&(De=performance)}catch{}const{userAgent:ie=""}=Ht.navigator||{},L=Ht,b=Fe,oe=Le,ft=De;L.document;const T=!!b.documentElement&&!!b.head&&typeof b.addEventListener=="function"&&typeof b.createElement=="function",Re=~ie.indexOf("MSIE")||~ie.indexOf("Trident/");var Rn=/fa(s|r|l|t|d|dr|dl|dt|b|k|kd|ss|sr|sl|st|sds|sdr|sdl|sdt)?[\-\ ]/,zn=/Font ?Awesome ?([56 ]*)(Solid|Regular|Light|Thin|Duotone|Brands|Free|Pro|Sharp Duotone|Sharp|Kit)?.*/i,ze={classic:{fa:"solid",fas:"solid","fa-solid":"solid",far:"regular","fa-regular":"regular",fal:"light","fa-light":"light",fat:"thin","fa-thin":"thin",fab:"brands","fa-brands":"brands"},duotone:{fa:"solid",fad:"solid","fa-solid":"solid","fa-duotone":"solid",fadr:"regular","fa-regular":"regular",fadl:"light","fa-light":"light",fadt:"thin","fa-thin":"thin"},sharp:{fa:"solid",fass:"solid","fa-solid":"solid",fasr:"regular","fa-regular":"regular",fasl:"light","fa-light":"light",fast:"thin","fa-thin":"thin"},"sharp-duotone":{fa:"solid",fasds:"solid","fa-solid":"solid",fasdr:"regular","fa-regular":"regular",fasdl:"light","fa-light":"light",fasdt:"thin","fa-thin":"thin"}},jn={GROUP:"duotone-group",PRIMARY:"primary",SECONDARY:"secondary"},je=["fa-classic","fa-duotone","fa-sharp","fa-sharp-duotone"],S="classic",ht="duotone",Yn="sharp",Un="sharp-duotone",Ye=[S,ht,Yn,Un],Wn={classic:{900:"fas",400:"far",normal:"far",300:"fal",100:"fat"},duotone:{900:"fad",400:"fadr",300:"fadl",100:"fadt"},sharp:{900:"fass",400:"fasr",300:"fasl",100:"fast"},"sharp-duotone":{900:"fasds",400:"fasdr",300:"fasdl",100:"fasdt"}},$n={"Font Awesome 6 Free":{900:"fas",400:"far"},"Font Awesome 6 Pro":{900:"fas",400:"far",normal:"far",300:"fal",100:"fat"},"Font Awesome 6 Brands":{400:"fab",normal:"fab"},"Font Awesome 6 Duotone":{900:"fad",400:"fadr",normal:"fadr",300:"fadl",100:"fadt"},"Font Awesome 6 Sharp":{900:"fass",400:"fasr",normal:"fasr",300:"fasl",100:"fast"},"Font Awesome 6 Sharp Duotone":{900:"fasds",400:"fasdr",normal:"fasdr",300:"fasdl",100:"fasdt"}},Hn=new Map([["classic",{defaultShortPrefixId:"fas",defaultStyleId:"solid",styleIds:["solid","regular","light","thin","brands"],futureStyleIds:[],defaultFontWeight:900}],["sharp",{defaultShortPrefixId:"fass",defaultStyleId:"solid",styleIds:["solid","regular","light","thin"],futureStyleIds:[],defaultFontWeight:900}],["duotone",{defaultShortPrefixId:"fad",defaultStyleId:"solid",styleIds:["solid","regular","light","thin"],futureStyleIds:[],defaultFontWeight:900}],["sharp-duotone",{defaultShortPrefixId:"fasds",defaultStyleId:"solid",styleIds:["solid","regular","light","thin"],futureStyleIds:[],defaultFontWeight:900}]]),Gn={classic:{solid:"fas",regular:"far",light:"fal",thin:"fat",brands:"fab"},duotone:{solid:"fad",regular:"fadr",light:"fadl",thin:"fadt"},sharp:{solid:"fass",regular:"fasr",light:"fasl",thin:"fast"},"sharp-duotone":{solid:"fasds",regular:"fasdr",light:"fasdl",thin:"fasdt"}},Xn=["fak","fa-kit","fakd","fa-kit-duotone"],se={kit:{fak:"kit","fa-kit":"kit"},"kit-duotone":{fakd:"kit-duotone","fa-kit-duotone":"kit-duotone"}},Bn=["kit"],Vn={kit:{"fa-kit":"fak"}},Kn=["fak","fakd"],qn={kit:{fak:"fa-kit"}},le={kit:{kit:"fak"},"kit-duotone":{"kit-duotone":"fakd"}},ut={GROUP:"duotone-group",SWAP_OPACITY:"swap-opacity",PRIMARY:"primary",SECONDARY:"secondary"},Qn=["fa-classic","fa-duotone","fa-sharp","fa-sharp-duotone"],Jn=["fak","fa-kit","fakd","fa-kit-duotone"],Zn={"Font Awesome Kit":{400:"fak",normal:"fak"},"Font Awesome Kit Duotone":{400:"fakd",normal:"fakd"}},ta={classic:{"fa-brands":"fab","fa-duotone":"fad","fa-light":"fal","fa-regular":"far","fa-solid":"fas","fa-thin":"fat"},duotone:{"fa-regular":"fadr","fa-light":"fadl","fa-thin":"fadt"},sharp:{"fa-solid":"fass","fa-regular":"fasr","fa-light":"fasl","fa-thin":"fast"},"sharp-duotone":{"fa-solid":"fasds","fa-regular":"fasdr","fa-light":"fasdl","fa-thin":"fasdt"}},ea={classic:["fas","far","fal","fat","fad"],duotone:["fadr","fadl","fadt"],sharp:["fass","fasr","fasl","fast"],"sharp-duotone":["fasds","fasdr","fasdl","fasdt"]},Ot={classic:{fab:"fa-brands",fad:"fa-duotone",fal:"fa-light",far:"fa-regular",fas:"fa-solid",fat:"fa-thin"},duotone:{fadr:"fa-regular",fadl:"fa-light",fadt:"fa-thin"},sharp:{fass:"fa-solid",fasr:"fa-regular",fasl:"fa-light",fast:"fa-thin"},"sharp-duotone":{fasds:"fa-solid",fasdr:"fa-regular",fasdl:"fa-light",fasdt:"fa-thin"}},na=["fa-solid","fa-regular","fa-light","fa-thin","fa-duotone","fa-brands"],It=["fa","fas","far","fal","fat","fad","fadr","fadl","fadt","fab","fass","fasr","fasl","fast","fasds","fasdr","fasdl","fasdt",...Qn,...na],aa=["solid","regular","light","thin","duotone","brands"],Ue=[1,2,3,4,5,6,7,8,9,10],ra=Ue.concat([11,12,13,14,15,16,17,18,19,20]),ia=[...Object.keys(ea),...aa,"2xs","xs","sm","lg","xl","2xl","beat","border","fade","beat-fade","bounce","flip-both","flip-horizontal","flip-vertical","flip","fw","inverse","layers-counter","layers-text","layers","li","pull-left","pull-right","pulse","rotate-180","rotate-270","rotate-90","rotate-by","shake","spin-pulse","spin-reverse","spin","stack-1x","stack-2x","stack","ul",ut.GROUP,ut.SWAP_OPACITY,ut.PRIMARY,ut.SECONDARY].concat(Ue.map(t=>"".concat(t,"x"))).concat(ra.map(t=>"w-".concat(t))),oa={"Font Awesome 5 Free":{900:"fas",400:"far"},"Font Awesome 5 Pro":{900:"fas",400:"far",normal:"far",300:"fal"},"Font Awesome 5 Brands":{400:"fab",normal:"fab"},"Font Awesome 5 Duotone":{900:"fad"}};const N="___FONT_AWESOME___",_t=16,We="fa",$e="svg-inline--fa",$="data-fa-i2svg",Nt="data-fa-pseudo-element",sa="data-fa-pseudo-element-pending",Gt="data-prefix",Xt="data-icon",ce="fontawesome-i2svg",la="async",ca=["HTML","HEAD","STYLE","SCRIPT"],He=(()=>{try{return!0}catch{return!1}})();function st(t){return new Proxy(t,{get(e,n){return n in e?e[n]:e[S]}})}const Ge=l({},ze);Ge[S]=l(l(l(l({},{"fa-duotone":"duotone"}),ze[S]),se.kit),se["kit-duotone"]);const fa=st(Ge),Mt=l({},Gn);Mt[S]=l(l(l(l({},{duotone:"fad"}),Mt[S]),le.kit),le["kit-duotone"]);const fe=st(Mt),Tt=l({},Ot);Tt[S]=l(l({},Tt[S]),qn.kit);const Bt=st(Tt),Ft=l({},ta);Ft[S]=l(l({},Ft[S]),Vn.kit);st(Ft);const ua=Rn,Xe="fa-layers-text",ma=zn,da=l({},Wn);st(da);const ga=["class","data-prefix","data-icon","data-fa-transform","data-fa-mask"],kt=jn,pa=[...Bn,...ia],nt=L.FontAwesomeConfig||{};function ha(t){var e=b.querySelector("script["+t+"]");if(e)return e.getAttribute(t)}function ba(t){return t===""?!0:t==="false"?!1:t==="true"?!0:t}b&&typeof b.querySelector=="function"&&[["data-family-prefix","familyPrefix"],["data-css-prefix","cssPrefix"],["data-family-default","familyDefault"],["data-style-default","styleDefault"],["data-replacement-class","replacementClass"],["data-auto-replace-svg","autoReplaceSvg"],["data-auto-add-css","autoAddCss"],["data-auto-a11y","autoA11y"],["data-search-pseudo-elements","searchPseudoElements"],["data-observe-mutations","observeMutations"],["data-mutate-approach","mutateApproach"],["data-keep-original-source","keepOriginalSource"],["data-measure-performance","measurePerformance"],["data-show-missing-icons","showMissingIcons"]].forEach(e=>{let[n,a]=e;const r=ba(ha(n));r!=null&&(nt[a]=r)});const Be={styleDefault:"solid",familyDefault:S,cssPrefix:We,replacementClass:$e,autoReplaceSvg:!0,autoAddCss:!0,autoA11y:!0,searchPseudoElements:!1,observeMutations:!0,mutateApproach:"async",keepOriginalSource:!0,measurePerformance:!1,showMissingIcons:!0};nt.familyPrefix&&(nt.cssPrefix=nt.familyPrefix);const J=l(l({},Be),nt);J.autoReplaceSvg||(J.observeMutations=!1);const u={};Object.keys(Be).forEach(t=>{Object.defineProperty(u,t,{enumerable:!0,set:function(e){J[t]=e,at.forEach(n=>n(u))},get:function(){return J[t]}})});Object.defineProperty(u,"familyPrefix",{enumerable:!0,set:function(t){J.cssPrefix=t,at.forEach(e=>e(u))},get:function(){return J.cssPrefix}});L.FontAwesomeConfig=u;const at=[];function ya(t){return at.push(t),()=>{at.splice(at.indexOf(t),1)}}const F=_t,O={size:16,x:0,y:0,rotate:0,flipX:!1,flipY:!1};function va(t){if(!t||!T)return;const e=b.createElement("style");e.setAttribute("type","text/css"),e.innerHTML=t;const n=b.head.childNodes;let a=null;for(let r=n.length-1;r>-1;r--){const i=n[r],o=(i.tagName||"").toUpperCase();["STYLE","LINK"].indexOf(o)>-1&&(a=i)}return b.head.insertBefore(e,a),t}const xa="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";function it(){let t=12,e="";for(;t-- >0;)e+=xa[Math.random()*62|0];return e}function Z(t){const e=[];for(let n=(t||[]).length>>>0;n--;)e[n]=t[n];return e}function Vt(t){return t.classList?Z(t.classList):(t.getAttribute("class")||"").split(" ").filter(e=>e)}function Ve(t){return"".concat(t).replace(/&/g,"&amp;").replace(/"/g,"&quot;").replace(/'/g,"&#39;").replace(/</g,"&lt;").replace(/>/g,"&gt;")}function Aa(t){return Object.keys(t||{}).reduce((e,n)=>e+"".concat(n,'="').concat(Ve(t[n]),'" '),"").trim()}function bt(t){return Object.keys(t||{}).reduce((e,n)=>e+"".concat(n,": ").concat(t[n].trim(),";"),"")}function Kt(t){return t.size!==O.size||t.x!==O.x||t.y!==O.y||t.rotate!==O.rotate||t.flipX||t.flipY}function ka(t){let{transform:e,containerWidth:n,iconWidth:a}=t;const r={transform:"translate(".concat(n/2," 256)")},i="translate(".concat(e.x*32,", ").concat(e.y*32,") "),o="scale(".concat(e.size/16*(e.flipX?-1:1),", ").concat(e.size/16*(e.flipY?-1:1),") "),s="rotate(".concat(e.rotate," 0 0)"),m={transform:"".concat(i," ").concat(o," ").concat(s)},c={transform:"translate(".concat(a/2*-1," -256)")};return{outer:r,inner:m,path:c}}function wa(t){let{transform:e,width:n=_t,height:a=_t,startCentered:r=!1}=t,i="";return r&&Re?i+="translate(".concat(e.x/F-n/2,"em, ").concat(e.y/F-a/2,"em) "):r?i+="translate(calc(-50% + ".concat(e.x/F,"em), calc(-50% + ").concat(e.y/F,"em)) "):i+="translate(".concat(e.x/F,"em, ").concat(e.y/F,"em) "),i+="scale(".concat(e.size/F*(e.flipX?-1:1),", ").concat(e.size/F*(e.flipY?-1:1),") "),i+="rotate(".concat(e.rotate,"deg) "),i}var Sa=`:root, :host {
  --fa-font-solid: normal 900 1em/1 "Font Awesome 6 Free";
  --fa-font-regular: normal 400 1em/1 "Font Awesome 6 Free";
  --fa-font-light: normal 300 1em/1 "Font Awesome 6 Pro";
  --fa-font-thin: normal 100 1em/1 "Font Awesome 6 Pro";
  --fa-font-duotone: normal 900 1em/1 "Font Awesome 6 Duotone";
  --fa-font-duotone-regular: normal 400 1em/1 "Font Awesome 6 Duotone";
  --fa-font-duotone-light: normal 300 1em/1 "Font Awesome 6 Duotone";
  --fa-font-duotone-thin: normal 100 1em/1 "Font Awesome 6 Duotone";
  --fa-font-brands: normal 400 1em/1 "Font Awesome 6 Brands";
  --fa-font-sharp-solid: normal 900 1em/1 "Font Awesome 6 Sharp";
  --fa-font-sharp-regular: normal 400 1em/1 "Font Awesome 6 Sharp";
  --fa-font-sharp-light: normal 300 1em/1 "Font Awesome 6 Sharp";
  --fa-font-sharp-thin: normal 100 1em/1 "Font Awesome 6 Sharp";
  --fa-font-sharp-duotone-solid: normal 900 1em/1 "Font Awesome 6 Sharp Duotone";
  --fa-font-sharp-duotone-regular: normal 400 1em/1 "Font Awesome 6 Sharp Duotone";
  --fa-font-sharp-duotone-light: normal 300 1em/1 "Font Awesome 6 Sharp Duotone";
  --fa-font-sharp-duotone-thin: normal 100 1em/1 "Font Awesome 6 Sharp Duotone";
}

svg:not(:root).svg-inline--fa, svg:not(:host).svg-inline--fa {
  overflow: visible;
  box-sizing: content-box;
}

.svg-inline--fa {
  display: var(--fa-display, inline-block);
  height: 1em;
  overflow: visible;
  vertical-align: -0.125em;
}
.svg-inline--fa.fa-2xs {
  vertical-align: 0.1em;
}
.svg-inline--fa.fa-xs {
  vertical-align: 0em;
}
.svg-inline--fa.fa-sm {
  vertical-align: -0.0714285705em;
}
.svg-inline--fa.fa-lg {
  vertical-align: -0.2em;
}
.svg-inline--fa.fa-xl {
  vertical-align: -0.25em;
}
.svg-inline--fa.fa-2xl {
  vertical-align: -0.3125em;
}
.svg-inline--fa.fa-pull-left {
  margin-right: var(--fa-pull-margin, 0.3em);
  width: auto;
}
.svg-inline--fa.fa-pull-right {
  margin-left: var(--fa-pull-margin, 0.3em);
  width: auto;
}
.svg-inline--fa.fa-li {
  width: var(--fa-li-width, 2em);
  top: 0.25em;
}
.svg-inline--fa.fa-fw {
  width: var(--fa-fw-width, 1.25em);
}

.fa-layers svg.svg-inline--fa {
  bottom: 0;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0;
}

.fa-layers-counter, .fa-layers-text {
  display: inline-block;
  position: absolute;
  text-align: center;
}

.fa-layers {
  display: inline-block;
  height: 1em;
  position: relative;
  text-align: center;
  vertical-align: -0.125em;
  width: 1em;
}
.fa-layers svg.svg-inline--fa {
  transform-origin: center center;
}

.fa-layers-text {
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  transform-origin: center center;
}

.fa-layers-counter {
  background-color: var(--fa-counter-background-color, #ff253a);
  border-radius: var(--fa-counter-border-radius, 1em);
  box-sizing: border-box;
  color: var(--fa-inverse, #fff);
  line-height: var(--fa-counter-line-height, 1);
  max-width: var(--fa-counter-max-width, 5em);
  min-width: var(--fa-counter-min-width, 1.5em);
  overflow: hidden;
  padding: var(--fa-counter-padding, 0.25em 0.5em);
  right: var(--fa-right, 0);
  text-overflow: ellipsis;
  top: var(--fa-top, 0);
  transform: scale(var(--fa-counter-scale, 0.25));
  transform-origin: top right;
}

.fa-layers-bottom-right {
  bottom: var(--fa-bottom, 0);
  right: var(--fa-right, 0);
  top: auto;
  transform: scale(var(--fa-layers-scale, 0.25));
  transform-origin: bottom right;
}

.fa-layers-bottom-left {
  bottom: var(--fa-bottom, 0);
  left: var(--fa-left, 0);
  right: auto;
  top: auto;
  transform: scale(var(--fa-layers-scale, 0.25));
  transform-origin: bottom left;
}

.fa-layers-top-right {
  top: var(--fa-top, 0);
  right: var(--fa-right, 0);
  transform: scale(var(--fa-layers-scale, 0.25));
  transform-origin: top right;
}

.fa-layers-top-left {
  left: var(--fa-left, 0);
  right: auto;
  top: var(--fa-top, 0);
  transform: scale(var(--fa-layers-scale, 0.25));
  transform-origin: top left;
}

.fa-1x {
  font-size: 1em;
}

.fa-2x {
  font-size: 2em;
}

.fa-3x {
  font-size: 3em;
}

.fa-4x {
  font-size: 4em;
}

.fa-5x {
  font-size: 5em;
}

.fa-6x {
  font-size: 6em;
}

.fa-7x {
  font-size: 7em;
}

.fa-8x {
  font-size: 8em;
}

.fa-9x {
  font-size: 9em;
}

.fa-10x {
  font-size: 10em;
}

.fa-2xs {
  font-size: 0.625em;
  line-height: 0.1em;
  vertical-align: 0.225em;
}

.fa-xs {
  font-size: 0.75em;
  line-height: 0.0833333337em;
  vertical-align: 0.125em;
}

.fa-sm {
  font-size: 0.875em;
  line-height: 0.0714285718em;
  vertical-align: 0.0535714295em;
}

.fa-lg {
  font-size: 1.25em;
  line-height: 0.05em;
  vertical-align: -0.075em;
}

.fa-xl {
  font-size: 1.5em;
  line-height: 0.0416666682em;
  vertical-align: -0.125em;
}

.fa-2xl {
  font-size: 2em;
  line-height: 0.03125em;
  vertical-align: -0.1875em;
}

.fa-fw {
  text-align: center;
  width: 1.25em;
}

.fa-ul {
  list-style-type: none;
  margin-left: var(--fa-li-margin, 2.5em);
  padding-left: 0;
}
.fa-ul > li {
  position: relative;
}

.fa-li {
  left: calc(-1 * var(--fa-li-width, 2em));
  position: absolute;
  text-align: center;
  width: var(--fa-li-width, 2em);
  line-height: inherit;
}

.fa-border {
  border-color: var(--fa-border-color, #eee);
  border-radius: var(--fa-border-radius, 0.1em);
  border-style: var(--fa-border-style, solid);
  border-width: var(--fa-border-width, 0.08em);
  padding: var(--fa-border-padding, 0.2em 0.25em 0.15em);
}

.fa-pull-left {
  float: left;
  margin-right: var(--fa-pull-margin, 0.3em);
}

.fa-pull-right {
  float: right;
  margin-left: var(--fa-pull-margin, 0.3em);
}

.fa-beat {
  animation-name: fa-beat;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.fa-bounce {
  animation-name: fa-bounce;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.28, 0.84, 0.42, 1));
}

.fa-fade {
  animation-name: fa-fade;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1));
}

.fa-beat-fade {
  animation-name: fa-beat-fade;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1));
}

.fa-flip {
  animation-name: fa-flip;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.fa-shake {
  animation-name: fa-shake;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, linear);
}

.fa-spin {
  animation-name: fa-spin;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 2s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, linear);
}

.fa-spin-reverse {
  --fa-animation-direction: reverse;
}

.fa-pulse,
.fa-spin-pulse {
  animation-name: fa-spin;
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, steps(8));
}

@media (prefers-reduced-motion: reduce) {
  .fa-beat,
.fa-bounce,
.fa-fade,
.fa-beat-fade,
.fa-flip,
.fa-pulse,
.fa-shake,
.fa-spin,
.fa-spin-pulse {
    animation-delay: -1ms;
    animation-duration: 1ms;
    animation-iteration-count: 1;
    transition-delay: 0s;
    transition-duration: 0s;
  }
}
@keyframes fa-beat {
  0%, 90% {
    transform: scale(1);
  }
  45% {
    transform: scale(var(--fa-beat-scale, 1.25));
  }
}
@keyframes fa-bounce {
  0% {
    transform: scale(1, 1) translateY(0);
  }
  10% {
    transform: scale(var(--fa-bounce-start-scale-x, 1.1), var(--fa-bounce-start-scale-y, 0.9)) translateY(0);
  }
  30% {
    transform: scale(var(--fa-bounce-jump-scale-x, 0.9), var(--fa-bounce-jump-scale-y, 1.1)) translateY(var(--fa-bounce-height, -0.5em));
  }
  50% {
    transform: scale(var(--fa-bounce-land-scale-x, 1.05), var(--fa-bounce-land-scale-y, 0.95)) translateY(0);
  }
  57% {
    transform: scale(1, 1) translateY(var(--fa-bounce-rebound, -0.125em));
  }
  64% {
    transform: scale(1, 1) translateY(0);
  }
  100% {
    transform: scale(1, 1) translateY(0);
  }
}
@keyframes fa-fade {
  50% {
    opacity: var(--fa-fade-opacity, 0.4);
  }
}
@keyframes fa-beat-fade {
  0%, 100% {
    opacity: var(--fa-beat-fade-opacity, 0.4);
    transform: scale(1);
  }
  50% {
    opacity: 1;
    transform: scale(var(--fa-beat-fade-scale, 1.125));
  }
}
@keyframes fa-flip {
  50% {
    transform: rotate3d(var(--fa-flip-x, 0), var(--fa-flip-y, 1), var(--fa-flip-z, 0), var(--fa-flip-angle, -180deg));
  }
}
@keyframes fa-shake {
  0% {
    transform: rotate(-15deg);
  }
  4% {
    transform: rotate(15deg);
  }
  8%, 24% {
    transform: rotate(-18deg);
  }
  12%, 28% {
    transform: rotate(18deg);
  }
  16% {
    transform: rotate(-22deg);
  }
  20% {
    transform: rotate(22deg);
  }
  32% {
    transform: rotate(-12deg);
  }
  36% {
    transform: rotate(12deg);
  }
  40%, 100% {
    transform: rotate(0deg);
  }
}
@keyframes fa-spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.fa-rotate-90 {
  transform: rotate(90deg);
}

.fa-rotate-180 {
  transform: rotate(180deg);
}

.fa-rotate-270 {
  transform: rotate(270deg);
}

.fa-flip-horizontal {
  transform: scale(-1, 1);
}

.fa-flip-vertical {
  transform: scale(1, -1);
}

.fa-flip-both,
.fa-flip-horizontal.fa-flip-vertical {
  transform: scale(-1, -1);
}

.fa-rotate-by {
  transform: rotate(var(--fa-rotate-angle, 0));
}

.fa-stack {
  display: inline-block;
  vertical-align: middle;
  height: 2em;
  position: relative;
  width: 2.5em;
}

.fa-stack-1x,
.fa-stack-2x {
  bottom: 0;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0;
  z-index: var(--fa-stack-z-index, auto);
}

.svg-inline--fa.fa-stack-1x {
  height: 1em;
  width: 1.25em;
}
.svg-inline--fa.fa-stack-2x {
  height: 2em;
  width: 2.5em;
}

.fa-inverse {
  color: var(--fa-inverse, #fff);
}

.sr-only,
.fa-sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}

.sr-only-focusable:not(:focus),
.fa-sr-only-focusable:not(:focus) {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}

.svg-inline--fa .fa-primary {
  fill: var(--fa-primary-color, currentColor);
  opacity: var(--fa-primary-opacity, 1);
}

.svg-inline--fa .fa-secondary {
  fill: var(--fa-secondary-color, currentColor);
  opacity: var(--fa-secondary-opacity, 0.4);
}

.svg-inline--fa.fa-swap-opacity .fa-primary {
  opacity: var(--fa-secondary-opacity, 0.4);
}

.svg-inline--fa.fa-swap-opacity .fa-secondary {
  opacity: var(--fa-primary-opacity, 1);
}

.svg-inline--fa mask .fa-primary,
.svg-inline--fa mask .fa-secondary {
  fill: black;
}`;function Ke(){const t=We,e=$e,n=u.cssPrefix,a=u.replacementClass;let r=Sa;if(n!==t||a!==e){const i=new RegExp("\\.".concat(t,"\\-"),"g"),o=new RegExp("\\--".concat(t,"\\-"),"g"),s=new RegExp("\\.".concat(e),"g");r=r.replace(i,".".concat(n,"-")).replace(o,"--".concat(n,"-")).replace(s,".".concat(a))}return r}let ue=!1;function wt(){u.autoAddCss&&!ue&&(va(Ke()),ue=!0)}var Pa={mixout(){return{dom:{css:Ke,insertCss:wt}}},hooks(){return{beforeDOMElementCreation(){wt()},beforeI2svg(){wt()}}}};const M=L||{};M[N]||(M[N]={});M[N].styles||(M[N].styles={});M[N].hooks||(M[N].hooks={});M[N].shims||(M[N].shims=[]);var I=M[N];const qe=[],Qe=function(){b.removeEventListener("DOMContentLoaded",Qe),gt=1,qe.map(t=>t())};let gt=!1;T&&(gt=(b.documentElement.doScroll?/^loaded|^c/:/^loaded|^i|^c/).test(b.readyState),gt||b.addEventListener("DOMContentLoaded",Qe));function Ea(t){T&&(gt?setTimeout(t,0):qe.push(t))}function lt(t){const{tag:e,attributes:n={},children:a=[]}=t;return typeof t=="string"?Ve(t):"<".concat(e," ").concat(Aa(n),">").concat(a.map(lt).join(""),"</").concat(e,">")}function me(t,e,n){if(t&&t[e]&&t[e][n])return{prefix:e,iconName:n,icon:t[e][n]}}var St=function(e,n,a,r){var i=Object.keys(e),o=i.length,s=n,m,c,d;for(a===void 0?(m=1,d=e[i[0]]):(m=0,d=a);m<o;m++)c=i[m],d=s(d,e[c],c,e);return d};function Ca(t){const e=[];let n=0;const a=t.length;for(;n<a;){const r=t.charCodeAt(n++);if(r>=55296&&r<=56319&&n<a){const i=t.charCodeAt(n++);(i&64512)==56320?e.push(((r&1023)<<10)+(i&1023)+65536):(e.push(r),n--)}else e.push(r)}return e}function Lt(t){const e=Ca(t);return e.length===1?e[0].toString(16):null}function Oa(t,e){const n=t.length;let a=t.charCodeAt(e),r;return a>=55296&&a<=56319&&n>e+1&&(r=t.charCodeAt(e+1),r>=56320&&r<=57343)?(a-55296)*1024+r-56320+65536:a}function de(t){return Object.keys(t).reduce((e,n)=>{const a=t[n];return!!a.icon?e[a.iconName]=a.icon:e[n]=a,e},{})}function Dt(t,e){let n=arguments.length>2&&arguments[2]!==void 0?arguments[2]:{};const{skipHooks:a=!1}=n,r=de(e);typeof I.hooks.addPack=="function"&&!a?I.hooks.addPack(t,de(e)):I.styles[t]=l(l({},I.styles[t]||{}),r),t==="fas"&&Dt("fa",e)}const{styles:ot,shims:Ia}=I,Je=Object.keys(Bt),_a=Je.reduce((t,e)=>(t[e]=Object.keys(Bt[e]),t),{});let qt=null,Ze={},tn={},en={},nn={},an={};function Na(t){return~pa.indexOf(t)}function Ma(t,e){const n=e.split("-"),a=n[0],r=n.slice(1).join("-");return a===t&&r!==""&&!Na(r)?r:null}const rn=()=>{const t=a=>St(ot,(r,i,o)=>(r[o]=St(i,a,{}),r),{});Ze=t((a,r,i)=>(r[3]&&(a[r[3]]=i),r[2]&&r[2].filter(s=>typeof s=="number").forEach(s=>{a[s.toString(16)]=i}),a)),tn=t((a,r,i)=>(a[i]=i,r[2]&&r[2].filter(s=>typeof s=="string").forEach(s=>{a[s]=i}),a)),an=t((a,r,i)=>{const o=r[2];return a[i]=i,o.forEach(s=>{a[s]=i}),a});const e="far"in ot||u.autoFetchSvg,n=St(Ia,(a,r)=>{const i=r[0];let o=r[1];const s=r[2];return o==="far"&&!e&&(o="fas"),typeof i=="string"&&(a.names[i]={prefix:o,iconName:s}),typeof i=="number"&&(a.unicodes[i.toString(16)]={prefix:o,iconName:s}),a},{names:{},unicodes:{}});en=n.names,nn=n.unicodes,qt=yt(u.styleDefault,{family:u.familyDefault})};ya(t=>{qt=yt(t.styleDefault,{family:u.familyDefault})});rn();function Qt(t,e){return(Ze[t]||{})[e]}function Ta(t,e){return(tn[t]||{})[e]}function Y(t,e){return(an[t]||{})[e]}function on(t){return en[t]||{prefix:null,iconName:null}}function Fa(t){const e=nn[t],n=Qt("fas",t);return e||(n?{prefix:"fas",iconName:n}:null)||{prefix:null,iconName:null}}function D(){return qt}const sn=()=>({prefix:null,iconName:null,rest:[]});function La(t){let e=S;const n=Je.reduce((a,r)=>(a[r]="".concat(u.cssPrefix,"-").concat(r),a),{});return Ye.forEach(a=>{(t.includes(n[a])||t.some(r=>_a[a].includes(r)))&&(e=a)}),e}function yt(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{family:n=S}=e,a=fa[n][t];if(n===ht&&!t)return"fad";const r=fe[n][t]||fe[n][a],i=t in I.styles?t:null;return r||i||null}function Da(t){let e=[],n=null;return t.forEach(a=>{const r=Ma(u.cssPrefix,a);r?n=r:a&&e.push(a)}),{iconName:n,rest:e}}function ge(t){return t.sort().filter((e,n,a)=>a.indexOf(e)===n)}function vt(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{skipLookups:n=!1}=e;let a=null;const r=It.concat(Jn),i=ge(t.filter(h=>r.includes(h))),o=ge(t.filter(h=>!It.includes(h))),s=i.filter(h=>(a=h,!je.includes(h))),[m=null]=s,c=La(i),d=l(l({},Da(o)),{},{prefix:yt(m,{family:c})});return l(l(l({},d),Ya({values:t,family:c,styles:ot,config:u,canonical:d,givenPrefix:a})),Ra(n,a,d))}function Ra(t,e,n){let{prefix:a,iconName:r}=n;if(t||!a||!r)return{prefix:a,iconName:r};const i=e==="fa"?on(r):{},o=Y(a,r);return r=i.iconName||o||r,a=i.prefix||a,a==="far"&&!ot.far&&ot.fas&&!u.autoFetchSvg&&(a="fas"),{prefix:a,iconName:r}}const za=Ye.filter(t=>t!==S||t!==ht),ja=Object.keys(Ot).filter(t=>t!==S).map(t=>Object.keys(Ot[t])).flat();function Ya(t){const{values:e,family:n,canonical:a,givenPrefix:r="",styles:i={},config:o={}}=t,s=n===ht,m=e.includes("fa-duotone")||e.includes("fad"),c=o.familyDefault==="duotone",d=a.prefix==="fad"||a.prefix==="fa-duotone";if(!s&&(m||c||d)&&(a.prefix="fad"),(e.includes("fa-brands")||e.includes("fab"))&&(a.prefix="fab"),!a.prefix&&za.includes(n)&&(Object.keys(i).find(f=>ja.includes(f))||o.autoFetchSvg)){const f=Hn.get(n).defaultShortPrefixId;a.prefix=f,a.iconName=Y(a.prefix,a.iconName)||a.iconName}return(a.prefix==="fa"||r==="fa")&&(a.prefix=D()||"fas"),a}class Ua{constructor(){this.definitions={}}add(){for(var e=arguments.length,n=new Array(e),a=0;a<e;a++)n[a]=arguments[a];const r=n.reduce(this._pullDefinitions,{});Object.keys(r).forEach(i=>{this.definitions[i]=l(l({},this.definitions[i]||{}),r[i]),Dt(i,r[i]);const o=Bt[S][i];o&&Dt(o,r[i]),rn()})}reset(){this.definitions={}}_pullDefinitions(e,n){const a=n.prefix&&n.iconName&&n.icon?{0:n}:n;return Object.keys(a).map(r=>{const{prefix:i,iconName:o,icon:s}=a[r],m=s[2];e[i]||(e[i]={}),m.length>0&&m.forEach(c=>{typeof c=="string"&&(e[i][c]=s)}),e[i][o]=s}),e}}let pe=[],V={};const q={},Wa=Object.keys(q);function $a(t,e){let{mixoutsTo:n}=e;return pe=t,V={},Object.keys(q).forEach(a=>{Wa.indexOf(a)===-1&&delete q[a]}),pe.forEach(a=>{const r=a.mixout?a.mixout():{};if(Object.keys(r).forEach(i=>{typeof r[i]=="function"&&(n[i]=r[i]),typeof r[i]=="object"&&Object.keys(r[i]).forEach(o=>{n[i]||(n[i]={}),n[i][o]=r[i][o]})}),a.hooks){const i=a.hooks();Object.keys(i).forEach(o=>{V[o]||(V[o]=[]),V[o].push(i[o])})}a.provides&&a.provides(q)}),n}function Rt(t,e){for(var n=arguments.length,a=new Array(n>2?n-2:0),r=2;r<n;r++)a[r-2]=arguments[r];return(V[t]||[]).forEach(o=>{e=o.apply(null,[e,...a])}),e}function H(t){for(var e=arguments.length,n=new Array(e>1?e-1:0),a=1;a<e;a++)n[a-1]=arguments[a];(V[t]||[]).forEach(i=>{i.apply(null,n)})}function R(){const t=arguments[0],e=Array.prototype.slice.call(arguments,1);return q[t]?q[t].apply(null,e):void 0}function zt(t){t.prefix==="fa"&&(t.prefix="fas");let{iconName:e}=t;const n=t.prefix||D();if(e)return e=Y(n,e)||e,me(ln.definitions,n,e)||me(I.styles,n,e)}const ln=new Ua,Ha=()=>{u.autoReplaceSvg=!1,u.observeMutations=!1,H("noAuto")},Ga={i2svg:function(){let t=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};return T?(H("beforeI2svg",t),R("pseudoElements2svg",t),R("i2svg",t)):Promise.reject(new Error("Operation requires a DOM of some kind."))},watch:function(){let t=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};const{autoReplaceSvgRoot:e}=t;u.autoReplaceSvg===!1&&(u.autoReplaceSvg=!0),u.observeMutations=!0,Ea(()=>{Ba({autoReplaceSvgRoot:e}),H("watch",t)})}},Xa={icon:t=>{if(t===null)return null;if(typeof t=="object"&&t.prefix&&t.iconName)return{prefix:t.prefix,iconName:Y(t.prefix,t.iconName)||t.iconName};if(Array.isArray(t)&&t.length===2){const e=t[1].indexOf("fa-")===0?t[1].slice(3):t[1],n=yt(t[0]);return{prefix:n,iconName:Y(n,e)||e}}if(typeof t=="string"&&(t.indexOf("".concat(u.cssPrefix,"-"))>-1||t.match(ua))){const e=vt(t.split(" "),{skipLookups:!0});return{prefix:e.prefix||D(),iconName:Y(e.prefix,e.iconName)||e.iconName}}if(typeof t=="string"){const e=D();return{prefix:e,iconName:Y(e,t)||t}}}},C={noAuto:Ha,config:u,dom:Ga,parse:Xa,library:ln,findIconDefinition:zt,toHtml:lt},Ba=function(){let t=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};const{autoReplaceSvgRoot:e=b}=t;(Object.keys(I.styles).length>0||u.autoFetchSvg)&&T&&u.autoReplaceSvg&&C.dom.i2svg({node:e})};function xt(t,e){return Object.defineProperty(t,"abstract",{get:e}),Object.defineProperty(t,"html",{get:function(){return t.abstract.map(n=>lt(n))}}),Object.defineProperty(t,"node",{get:function(){if(!T)return;const n=b.createElement("div");return n.innerHTML=t.html,n.children}}),t}function Va(t){let{children:e,main:n,mask:a,attributes:r,styles:i,transform:o}=t;if(Kt(o)&&n.found&&!a.found){const{width:s,height:m}=n,c={x:s/m/2,y:.5};r.style=bt(l(l({},i),{},{"transform-origin":"".concat(c.x+o.x/16,"em ").concat(c.y+o.y/16,"em")}))}return[{tag:"svg",attributes:r,children:e}]}function Ka(t){let{prefix:e,iconName:n,children:a,attributes:r,symbol:i}=t;const o=i===!0?"".concat(e,"-").concat(u.cssPrefix,"-").concat(n):i;return[{tag:"svg",attributes:{style:"display: none;"},children:[{tag:"symbol",attributes:l(l({},r),{},{id:o}),children:a}]}]}function Jt(t){const{icons:{main:e,mask:n},prefix:a,iconName:r,transform:i,symbol:o,title:s,maskId:m,titleId:c,extra:d,watchable:h=!1}=t,{width:f,height:g}=n.found?n:e,y=Kn.includes(a),k=[u.replacementClass,r?"".concat(u.cssPrefix,"-").concat(r):""].filter(X=>d.classes.indexOf(X)===-1).filter(X=>X!==""||!!X).concat(d.classes).join(" ");let p={children:[],attributes:l(l({},d.attributes),{},{"data-prefix":a,"data-icon":r,class:k,role:d.attributes.role||"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 ".concat(f," ").concat(g)})};const w=y&&!~d.classes.indexOf("fa-fw")?{width:"".concat(f/g*16*.0625,"em")}:{};h&&(p.attributes[$]=""),s&&(p.children.push({tag:"title",attributes:{id:p.attributes["aria-labelledby"]||"title-".concat(c||it())},children:[s]}),delete p.attributes.title);const A=l(l({},p),{},{prefix:a,iconName:r,main:e,mask:n,maskId:m,transform:i,symbol:o,styles:l(l({},w),d.styles)}),{children:E,attributes:G}=n.found&&e.found?R("generateAbstractMask",A)||{children:[],attributes:{}}:R("generateAbstractIcon",A)||{children:[],attributes:{}};return A.children=E,A.attributes=G,o?Ka(A):Va(A)}function he(t){const{content:e,width:n,height:a,transform:r,title:i,extra:o,watchable:s=!1}=t,m=l(l(l({},o.attributes),i?{title:i}:{}),{},{class:o.classes.join(" ")});s&&(m[$]="");const c=l({},o.styles);Kt(r)&&(c.transform=wa({transform:r,startCentered:!0,width:n,height:a}),c["-webkit-transform"]=c.transform);const d=bt(c);d.length>0&&(m.style=d);const h=[];return h.push({tag:"span",attributes:m,children:[e]}),i&&h.push({tag:"span",attributes:{class:"sr-only"},children:[i]}),h}function qa(t){const{content:e,title:n,extra:a}=t,r=l(l(l({},a.attributes),n?{title:n}:{}),{},{class:a.classes.join(" ")}),i=bt(a.styles);i.length>0&&(r.style=i);const o=[];return o.push({tag:"span",attributes:r,children:[e]}),n&&o.push({tag:"span",attributes:{class:"sr-only"},children:[n]}),o}const{styles:Pt}=I;function jt(t){const e=t[0],n=t[1],[a]=t.slice(4);let r=null;return Array.isArray(a)?r={tag:"g",attributes:{class:"".concat(u.cssPrefix,"-").concat(kt.GROUP)},children:[{tag:"path",attributes:{class:"".concat(u.cssPrefix,"-").concat(kt.SECONDARY),fill:"currentColor",d:a[0]}},{tag:"path",attributes:{class:"".concat(u.cssPrefix,"-").concat(kt.PRIMARY),fill:"currentColor",d:a[1]}}]}:r={tag:"path",attributes:{fill:"currentColor",d:a}},{found:!0,width:e,height:n,icon:r}}const Qa={found:!1,width:512,height:512};function Ja(t,e){!He&&!u.showMissingIcons&&t&&console.error('Icon with name "'.concat(t,'" and prefix "').concat(e,'" is missing.'))}function Yt(t,e){let n=e;return e==="fa"&&u.styleDefault!==null&&(e=D()),new Promise((a,r)=>{if(n==="fa"){const i=on(t)||{};t=i.iconName||t,e=i.prefix||e}if(t&&e&&Pt[e]&&Pt[e][t]){const i=Pt[e][t];return a(jt(i))}Ja(t,e),a(l(l({},Qa),{},{icon:u.showMissingIcons&&t?R("missingIconAbstract")||{}:{}}))})}const be=()=>{},Ut=u.measurePerformance&&ft&&ft.mark&&ft.measure?ft:{mark:be,measure:be},tt='FA "6.7.2"',Za=t=>(Ut.mark("".concat(tt," ").concat(t," begins")),()=>cn(t)),cn=t=>{Ut.mark("".concat(tt," ").concat(t," ends")),Ut.measure("".concat(tt," ").concat(t),"".concat(tt," ").concat(t," begins"),"".concat(tt," ").concat(t," ends"))};var Zt={begin:Za,end:cn};const mt=()=>{};function ye(t){return typeof(t.getAttribute?t.getAttribute($):null)=="string"}function tr(t){const e=t.getAttribute?t.getAttribute(Gt):null,n=t.getAttribute?t.getAttribute(Xt):null;return e&&n}function er(t){return t&&t.classList&&t.classList.contains&&t.classList.contains(u.replacementClass)}function nr(){return u.autoReplaceSvg===!0?dt.replace:dt[u.autoReplaceSvg]||dt.replace}function ar(t){return b.createElementNS("http://www.w3.org/2000/svg",t)}function rr(t){return b.createElement(t)}function fn(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{ceFn:n=t.tag==="svg"?ar:rr}=e;if(typeof t=="string")return b.createTextNode(t);const a=n(t.tag);return Object.keys(t.attributes||[]).forEach(function(i){a.setAttribute(i,t.attributes[i])}),(t.children||[]).forEach(function(i){a.appendChild(fn(i,{ceFn:n}))}),a}function ir(t){let e=" ".concat(t.outerHTML," ");return e="".concat(e,"Font Awesome fontawesome.com "),e}const dt={replace:function(t){const e=t[0];if(e.parentNode)if(t[1].forEach(n=>{e.parentNode.insertBefore(fn(n),e)}),e.getAttribute($)===null&&u.keepOriginalSource){let n=b.createComment(ir(e));e.parentNode.replaceChild(n,e)}else e.remove()},nest:function(t){const e=t[0],n=t[1];if(~Vt(e).indexOf(u.replacementClass))return dt.replace(t);const a=new RegExp("".concat(u.cssPrefix,"-.*"));if(delete n[0].attributes.id,n[0].attributes.class){const i=n[0].attributes.class.split(" ").reduce((o,s)=>(s===u.replacementClass||s.match(a)?o.toSvg.push(s):o.toNode.push(s),o),{toNode:[],toSvg:[]});n[0].attributes.class=i.toSvg.join(" "),i.toNode.length===0?e.removeAttribute("class"):e.setAttribute("class",i.toNode.join(" "))}const r=n.map(i=>lt(i)).join(`
`);e.setAttribute($,""),e.innerHTML=r}};function ve(t){t()}function un(t,e){const n=typeof e=="function"?e:mt;if(t.length===0)n();else{let a=ve;u.mutateApproach===la&&(a=L.requestAnimationFrame||ve),a(()=>{const r=nr(),i=Zt.begin("mutate");t.map(r),i(),n()})}}let te=!1;function mn(){te=!0}function Wt(){te=!1}let pt=null;function xe(t){if(!oe||!u.observeMutations)return;const{treeCallback:e=mt,nodeCallback:n=mt,pseudoElementsCallback:a=mt,observeMutationsRoot:r=b}=t;pt=new oe(i=>{if(te)return;const o=D();Z(i).forEach(s=>{if(s.type==="childList"&&s.addedNodes.length>0&&!ye(s.addedNodes[0])&&(u.searchPseudoElements&&a(s.target),e(s.target)),s.type==="attributes"&&s.target.parentNode&&u.searchPseudoElements&&a(s.target.parentNode),s.type==="attributes"&&ye(s.target)&&~ga.indexOf(s.attributeName))if(s.attributeName==="class"&&tr(s.target)){const{prefix:m,iconName:c}=vt(Vt(s.target));s.target.setAttribute(Gt,m||o),c&&s.target.setAttribute(Xt,c)}else er(s.target)&&n(s.target)})}),T&&pt.observe(r,{childList:!0,attributes:!0,characterData:!0,subtree:!0})}function or(){pt&&pt.disconnect()}function sr(t){const e=t.getAttribute("style");let n=[];return e&&(n=e.split(";").reduce((a,r)=>{const i=r.split(":"),o=i[0],s=i.slice(1);return o&&s.length>0&&(a[o]=s.join(":").trim()),a},{})),n}function lr(t){const e=t.getAttribute("data-prefix"),n=t.getAttribute("data-icon"),a=t.innerText!==void 0?t.innerText.trim():"";let r=vt(Vt(t));return r.prefix||(r.prefix=D()),e&&n&&(r.prefix=e,r.iconName=n),r.iconName&&r.prefix||(r.prefix&&a.length>0&&(r.iconName=Ta(r.prefix,t.innerText)||Qt(r.prefix,Lt(t.innerText))),!r.iconName&&u.autoFetchSvg&&t.firstChild&&t.firstChild.nodeType===Node.TEXT_NODE&&(r.iconName=t.firstChild.data)),r}function cr(t){const e=Z(t.attributes).reduce((r,i)=>(r.name!=="class"&&r.name!=="style"&&(r[i.name]=i.value),r),{}),n=t.getAttribute("title"),a=t.getAttribute("data-fa-title-id");return u.autoA11y&&(n?e["aria-labelledby"]="".concat(u.replacementClass,"-title-").concat(a||it()):(e["aria-hidden"]="true",e.focusable="false")),e}function fr(){return{iconName:null,title:null,titleId:null,prefix:null,transform:O,symbol:!1,mask:{iconName:null,prefix:null,rest:[]},maskId:null,extra:{classes:[],styles:{},attributes:{}}}}function Ae(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{styleParser:!0};const{iconName:n,prefix:a,rest:r}=lr(t),i=cr(t),o=Rt("parseNodeAttributes",{},t);let s=e.styleParser?sr(t):[];return l({iconName:n,title:t.getAttribute("title"),titleId:t.getAttribute("data-fa-title-id"),prefix:a,transform:O,mask:{iconName:null,prefix:null,rest:[]},maskId:null,symbol:!1,extra:{classes:r,styles:s,attributes:i}},o)}const{styles:ur}=I;function dn(t){const e=u.autoReplaceSvg==="nest"?Ae(t,{styleParser:!1}):Ae(t);return~e.extra.classes.indexOf(Xe)?R("generateLayersText",t,e):R("generateSvgReplacementMutation",t,e)}function mr(){return[...Xn,...It]}function ke(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:null;if(!T)return Promise.resolve();const n=b.documentElement.classList,a=d=>n.add("".concat(ce,"-").concat(d)),r=d=>n.remove("".concat(ce,"-").concat(d)),i=u.autoFetchSvg?mr():je.concat(Object.keys(ur));i.includes("fa")||i.push("fa");const o=[".".concat(Xe,":not([").concat($,"])")].concat(i.map(d=>".".concat(d,":not([").concat($,"])"))).join(", ");if(o.length===0)return Promise.resolve();let s=[];try{s=Z(t.querySelectorAll(o))}catch{}if(s.length>0)a("pending"),r("complete");else return Promise.resolve();const m=Zt.begin("onTree"),c=s.reduce((d,h)=>{try{const f=dn(h);f&&d.push(f)}catch(f){He||f.name==="MissingIcon"&&console.error(f)}return d},[]);return new Promise((d,h)=>{Promise.all(c).then(f=>{un(f,()=>{a("active"),a("complete"),r("pending"),typeof e=="function"&&e(),m(),d()})}).catch(f=>{m(),h(f)})})}function dr(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:null;dn(t).then(n=>{n&&un([n],e)})}function gr(t){return function(e){let n=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const a=(e||{}).icon?e:zt(e||{});let{mask:r}=n;return r&&(r=(r||{}).icon?r:zt(r||{})),t(a,l(l({},n),{},{mask:r}))}}const pr=function(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{transform:n=O,symbol:a=!1,mask:r=null,maskId:i=null,title:o=null,titleId:s=null,classes:m=[],attributes:c={},styles:d={}}=e;if(!t)return;const{prefix:h,iconName:f,icon:g}=t;return xt(l({type:"icon"},t),()=>(H("beforeDOMElementCreation",{iconDefinition:t,params:e}),u.autoA11y&&(o?c["aria-labelledby"]="".concat(u.replacementClass,"-title-").concat(s||it()):(c["aria-hidden"]="true",c.focusable="false")),Jt({icons:{main:jt(g),mask:r?jt(r.icon):{found:!1,width:null,height:null,icon:{}}},prefix:h,iconName:f,transform:l(l({},O),n),symbol:a,title:o,maskId:i,titleId:s,extra:{attributes:c,styles:d,classes:m}})))};var hr={mixout(){return{icon:gr(pr)}},hooks(){return{mutationObserverCallbacks(t){return t.treeCallback=ke,t.nodeCallback=dr,t}}},provides(t){t.i2svg=function(e){const{node:n=b,callback:a=()=>{}}=e;return ke(n,a)},t.generateSvgReplacementMutation=function(e,n){const{iconName:a,title:r,titleId:i,prefix:o,transform:s,symbol:m,mask:c,maskId:d,extra:h}=n;return new Promise((f,g)=>{Promise.all([Yt(a,o),c.iconName?Yt(c.iconName,c.prefix):Promise.resolve({found:!1,width:512,height:512,icon:{}})]).then(y=>{let[k,p]=y;f([e,Jt({icons:{main:k,mask:p},prefix:o,iconName:a,transform:s,symbol:m,maskId:d,title:r,titleId:i,extra:h,watchable:!0})])}).catch(g)})},t.generateAbstractIcon=function(e){let{children:n,attributes:a,main:r,transform:i,styles:o}=e;const s=bt(o);s.length>0&&(a.style=s);let m;return Kt(i)&&(m=R("generateAbstractTransformGrouping",{main:r,transform:i,containerWidth:r.width,iconWidth:r.width})),n.push(m||r.icon),{children:n,attributes:a}}}},br={mixout(){return{layer(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{classes:n=[]}=e;return xt({type:"layer"},()=>{H("beforeDOMElementCreation",{assembler:t,params:e});let a=[];return t(r=>{Array.isArray(r)?r.map(i=>{a=a.concat(i.abstract)}):a=a.concat(r.abstract)}),[{tag:"span",attributes:{class:["".concat(u.cssPrefix,"-layers"),...n].join(" ")},children:a}]})}}}},yr={mixout(){return{counter(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{title:n=null,classes:a=[],attributes:r={},styles:i={}}=e;return xt({type:"counter",content:t},()=>(H("beforeDOMElementCreation",{content:t,params:e}),qa({content:t.toString(),title:n,extra:{attributes:r,styles:i,classes:["".concat(u.cssPrefix,"-layers-counter"),...a]}})))}}}},vr={mixout(){return{text(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{transform:n=O,title:a=null,classes:r=[],attributes:i={},styles:o={}}=e;return xt({type:"text",content:t},()=>(H("beforeDOMElementCreation",{content:t,params:e}),he({content:t,transform:l(l({},O),n),title:a,extra:{attributes:i,styles:o,classes:["".concat(u.cssPrefix,"-layers-text"),...r]}})))}}},provides(t){t.generateLayersText=function(e,n){const{title:a,transform:r,extra:i}=n;let o=null,s=null;if(Re){const m=parseInt(getComputedStyle(e).fontSize,10),c=e.getBoundingClientRect();o=c.width/m,s=c.height/m}return u.autoA11y&&!a&&(i.attributes["aria-hidden"]="true"),Promise.resolve([e,he({content:e.innerHTML,width:o,height:s,transform:r,title:a,extra:i,watchable:!0})])}}};const xr=new RegExp('"',"ug"),we=[1105920,1112319],Se=l(l(l(l({},{FontAwesome:{normal:"fas",400:"fas"}}),$n),oa),Zn),$t=Object.keys(Se).reduce((t,e)=>(t[e.toLowerCase()]=Se[e],t),{}),Ar=Object.keys($t).reduce((t,e)=>{const n=$t[e];return t[e]=n[900]||[...Object.entries(n)][0][1],t},{});function kr(t){const e=t.replace(xr,""),n=Oa(e,0),a=n>=we[0]&&n<=we[1],r=e.length===2?e[0]===e[1]:!1;return{value:Lt(r?e[0]:e),isSecondary:a||r}}function wr(t,e){const n=t.replace(/^['"]|['"]$/g,"").toLowerCase(),a=parseInt(e),r=isNaN(a)?"normal":a;return($t[n]||{})[r]||Ar[n]}function Pe(t,e){const n="".concat(sa).concat(e.replace(":","-"));return new Promise((a,r)=>{if(t.getAttribute(n)!==null)return a();const o=Z(t.children).filter(f=>f.getAttribute(Nt)===e)[0],s=L.getComputedStyle(t,e),m=s.getPropertyValue("font-family"),c=m.match(ma),d=s.getPropertyValue("font-weight"),h=s.getPropertyValue("content");if(o&&!c)return t.removeChild(o),a();if(c&&h!=="none"&&h!==""){const f=s.getPropertyValue("content");let g=wr(m,d);const{value:y,isSecondary:k}=kr(f),p=c[0].startsWith("FontAwesome");let w=Qt(g,y),A=w;if(p){const E=Fa(y);E.iconName&&E.prefix&&(w=E.iconName,g=E.prefix)}if(w&&!k&&(!o||o.getAttribute(Gt)!==g||o.getAttribute(Xt)!==A)){t.setAttribute(n,A),o&&t.removeChild(o);const E=fr(),{extra:G}=E;G.attributes[Nt]=e,Yt(w,g).then(X=>{const gn=Jt(l(l({},E),{},{icons:{main:X,mask:sn()},prefix:g,iconName:A,extra:G,watchable:!0})),At=b.createElementNS("http://www.w3.org/2000/svg","svg");e==="::before"?t.insertBefore(At,t.firstChild):t.appendChild(At),At.outerHTML=gn.map(pn=>lt(pn)).join(`
`),t.removeAttribute(n),a()}).catch(r)}else a()}else a()})}function Sr(t){return Promise.all([Pe(t,"::before"),Pe(t,"::after")])}function Pr(t){return t.parentNode!==document.head&&!~ca.indexOf(t.tagName.toUpperCase())&&!t.getAttribute(Nt)&&(!t.parentNode||t.parentNode.tagName!=="svg")}function Ee(t){if(T)return new Promise((e,n)=>{const a=Z(t.querySelectorAll("*")).filter(Pr).map(Sr),r=Zt.begin("searchPseudoElements");mn(),Promise.all(a).then(()=>{r(),Wt(),e()}).catch(()=>{r(),Wt(),n()})})}var Er={hooks(){return{mutationObserverCallbacks(t){return t.pseudoElementsCallback=Ee,t}}},provides(t){t.pseudoElements2svg=function(e){const{node:n=b}=e;u.searchPseudoElements&&Ee(n)}}};let Ce=!1;var Cr={mixout(){return{dom:{unwatch(){mn(),Ce=!0}}}},hooks(){return{bootstrap(){xe(Rt("mutationObserverCallbacks",{}))},noAuto(){or()},watch(t){const{observeMutationsRoot:e}=t;Ce?Wt():xe(Rt("mutationObserverCallbacks",{observeMutationsRoot:e}))}}}};const Oe=t=>{let e={size:16,x:0,y:0,flipX:!1,flipY:!1,rotate:0};return t.toLowerCase().split(" ").reduce((n,a)=>{const r=a.toLowerCase().split("-"),i=r[0];let o=r.slice(1).join("-");if(i&&o==="h")return n.flipX=!0,n;if(i&&o==="v")return n.flipY=!0,n;if(o=parseFloat(o),isNaN(o))return n;switch(i){case"grow":n.size=n.size+o;break;case"shrink":n.size=n.size-o;break;case"left":n.x=n.x-o;break;case"right":n.x=n.x+o;break;case"up":n.y=n.y-o;break;case"down":n.y=n.y+o;break;case"rotate":n.rotate=n.rotate+o;break}return n},e)};var Or={mixout(){return{parse:{transform:t=>Oe(t)}}},hooks(){return{parseNodeAttributes(t,e){const n=e.getAttribute("data-fa-transform");return n&&(t.transform=Oe(n)),t}}},provides(t){t.generateAbstractTransformGrouping=function(e){let{main:n,transform:a,containerWidth:r,iconWidth:i}=e;const o={transform:"translate(".concat(r/2," 256)")},s="translate(".concat(a.x*32,", ").concat(a.y*32,") "),m="scale(".concat(a.size/16*(a.flipX?-1:1),", ").concat(a.size/16*(a.flipY?-1:1),") "),c="rotate(".concat(a.rotate," 0 0)"),d={transform:"".concat(s," ").concat(m," ").concat(c)},h={transform:"translate(".concat(i/2*-1," -256)")},f={outer:o,inner:d,path:h};return{tag:"g",attributes:l({},f.outer),children:[{tag:"g",attributes:l({},f.inner),children:[{tag:n.icon.tag,children:n.icon.children,attributes:l(l({},n.icon.attributes),f.path)}]}]}}}};const Et={x:0,y:0,width:"100%",height:"100%"};function Ie(t){let e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:!0;return t.attributes&&(t.attributes.fill||e)&&(t.attributes.fill="black"),t}function Ir(t){return t.tag==="g"?t.children:[t]}var _r={hooks(){return{parseNodeAttributes(t,e){const n=e.getAttribute("data-fa-mask"),a=n?vt(n.split(" ").map(r=>r.trim())):sn();return a.prefix||(a.prefix=D()),t.mask=a,t.maskId=e.getAttribute("data-fa-mask-id"),t}}},provides(t){t.generateAbstractMask=function(e){let{children:n,attributes:a,main:r,mask:i,maskId:o,transform:s}=e;const{width:m,icon:c}=r,{width:d,icon:h}=i,f=ka({transform:s,containerWidth:d,iconWidth:m}),g={tag:"rect",attributes:l(l({},Et),{},{fill:"white"})},y=c.children?{children:c.children.map(Ie)}:{},k={tag:"g",attributes:l({},f.inner),children:[Ie(l({tag:c.tag,attributes:l(l({},c.attributes),f.path)},y))]},p={tag:"g",attributes:l({},f.outer),children:[k]},w="mask-".concat(o||it()),A="clip-".concat(o||it()),E={tag:"mask",attributes:l(l({},Et),{},{id:w,maskUnits:"userSpaceOnUse",maskContentUnits:"userSpaceOnUse"}),children:[g,p]},G={tag:"defs",children:[{tag:"clipPath",attributes:{id:A},children:Ir(h)},E]};return n.push(G,{tag:"rect",attributes:l({fill:"currentColor","clip-path":"url(#".concat(A,")"),mask:"url(#".concat(w,")")},Et)}),{children:n,attributes:a}}}},Nr={provides(t){let e=!1;L.matchMedia&&(e=L.matchMedia("(prefers-reduced-motion: reduce)").matches),t.missingIconAbstract=function(){const n=[],a={fill:"currentColor"},r={attributeType:"XML",repeatCount:"indefinite",dur:"2s"};n.push({tag:"path",attributes:l(l({},a),{},{d:"M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z"})});const i=l(l({},r),{},{attributeName:"opacity"}),o={tag:"circle",attributes:l(l({},a),{},{cx:"256",cy:"364",r:"28"}),children:[]};return e||o.children.push({tag:"animate",attributes:l(l({},r),{},{attributeName:"r",values:"28;14;28;28;14;28;"})},{tag:"animate",attributes:l(l({},i),{},{values:"1;0;1;1;0;1;"})}),n.push(o),n.push({tag:"path",attributes:l(l({},a),{},{opacity:"1",d:"M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z"}),children:e?[]:[{tag:"animate",attributes:l(l({},i),{},{values:"1;0;0;0;0;1;"})}]}),e||n.push({tag:"path",attributes:l(l({},a),{},{opacity:"0",d:"M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z"}),children:[{tag:"animate",attributes:l(l({},i),{},{values:"0;0;1;1;0;0;"})}]}),{tag:"g",attributes:{class:"missing"},children:n}}}},Mr={hooks(){return{parseNodeAttributes(t,e){const n=e.getAttribute("data-fa-symbol"),a=n===null?!1:n===""?!0:n;return t.symbol=a,t}}}},Tr=[Pa,hr,br,yr,vr,Er,Cr,Or,_r,Nr,Mr];$a(Tr,{mixoutsTo:C});C.noAuto;C.config;C.library;C.dom;C.parse;C.findIconDefinition;C.toHtml;C.icon;C.layer;C.text;C.counter;const Fr={class:"relative overflow-hidden w-full p-link flex align-items-center p-2 pl-0 text-color hover:surface-200 border-noround"},Lr={class:"inline-flex flex-column"},Dr={class:"font-bold"},Rr={class:"text-sm mr-2"},zr={class:"layout-menu"},jr={key:1,class:"menu-separator"},Yr={__name:"AppMenu",setup(t){const{can:e}=_e();ct();const n=rt([{label:"Home",permision:"all",items:[{label:"Dashboard",icon:"pi pi-fw pi-home",to:"/admin",permision:"all"}]},{label:"Usuarios",items:[{label:"Users",icon:"pi pi-fw pi-id-card",to:"/admin/users",permision:"user-list"},{label:"Roles",icon:"pi pi-fw pi-check-square",to:"/admin/roles",permision:"role-list"},{label:"Permisos",icon:"pi pi-fw pi-bookmark",to:"/admin/permissions",permision:"permission-list"}]},{label:"Formularios",items:[{label:"Formularios",icon:"pi pi-fw pi-id-card",to:"/admin/formularios",permision:"all"},{label:"Preguntas",icon:"pi pi-fw pi-id-card",to:"/admin/questions",permision:"all"},{label:"Categorias",icon:"pi pi-fw pi-id-card",to:"/admin/categories",permision:"all"}]}]);return(a,r)=>{const i=Q("Avatar"),o=Q("router-link");return x(),P(B,null,[j(o,{to:"/app/profile"},{default:K(()=>{var s,m,c;return[v("button",Fr,[j(i,{image:(s=et(ct)().user)==null?void 0:s.avatar,class:"mr-3",shape:"circle"},null,8,["image"]),v("span",Lr,[v("span",Dr,W((m=et(ct)().user)==null?void 0:m.name),1),v("span",null,[(x(!0),P(B,null,Ct((c=et(ct)().user)==null?void 0:c.roles,d=>(x(),P("span",Rr,W(d.name),1))),256))])])])]}),_:1}),v("ul",zr,[(x(!0),P(B,null,Ct(n.value,(s,m)=>(x(),P(B,{key:s},[s.separator?_("",!0):(x(),U(Tn,{key:0,item:s,index:m},null,8,["item","index"])),s.separator?(x(),P("li",jr)):_("",!0)],64))),128))])],64)}}},Ur={__name:"AppSidebar",setup(t){return(e,n)=>(x(),U(Yr))}},Wr={class:"layout-sidebar"},$r={class:"layout-main-container"},Hr={class:"card mb-2 bread"},Gr=["href","onClick"],Xr={class:"text-primary font-semibold"},Br=["href","target"],Vr={class:"text-color"},Kr={class:"layout-main"},qr={__name:"Authenticated",setup(t){const e=Ne(),n=rt({icon:"pi pi-home",route:"/admin"}),a=ee(()=>{let f=e.path.split("/");return f.shift(),f.reduce((y,k,p)=>{var w,A;return y.push({route:y[p-1]?""+y[p-1].route+"/"+k:"/"+k,label:((w=e.matched[p])==null?void 0:w.meta.breadCrumb)||k,disabled:p+1===f.length||((A=e.matched[p])==null?void 0:A.meta.linked)===!1}),y},[])}),{layoutConfig:r,layoutState:i,isSidebarActive:o}=Te(),s=rt(null);Me(o,f=>{f?c():d()});const m=ee(()=>({"layout-theme-light":r.darkTheme.value==="light","layout-theme-dark":r.darkTheme.value==="dark","layout-overlay":r.menuMode.value==="overlay","layout-static":r.menuMode.value==="static","layout-static-inactive":i.staticMenuDesktopInactive.value&&r.menuMode.value==="static","layout-overlay-active":i.overlayMenuActive.value,"layout-mobile-active":i.staticMenuMobileActive.value,"p-input-filled":r.inputStyle.value==="filled","p-ripple-disabled":!r.ripple.value})),c=()=>{s.value||(s.value=f=>{h(f)&&(i.overlayMenuActive.value=!1,i.staticMenuMobileActive.value=!1,i.menuHoverActive.value=!1)},document.addEventListener("click",s.value))},d=()=>{s.value&&(document.removeEventListener("click",s),s.value=null)},h=f=>{const g=document.querySelector(".layout-sidebar"),y=document.querySelector(".layout-menu-button");return!(g.isSameNode(f.target)||g.contains(f.target)||y.isSameNode(f.target)||y.contains(f.target))};return(f,g)=>{const y=Q("router-link"),k=Q("router-view");return x(),P(B,null,[v("div",{class:z(["layout-wrapper",m.value])},[j(An,{class:"navbar"}),v("div",Wr,[j(Ur)]),v("div",$r,[v("div",Hr,[j(et(kn),{home:n.value,model:a.value},{item:K(({item:p,props:w})=>[p.route?(x(),U(y,{key:0,to:p.route,custom:""},{default:K(({href:A,navigate:E})=>[v("a",ne({href:A},w.action,{class:"btn btn-link",onClick:E}),[v("span",{class:z([p.icon,"text-color"])},null,2),v("span",Xr,W(p.label),1)],16,Gr)]),_:2},1032,["to"])):(x(),P("a",ne({key:1,href:p.url,target:p.target},w.action),[v("span",Vr,W(p.label),1)],16,Br))]),_:1},8,["home","model"])]),v("div",Kr,[(x(),U(xn,null,{default:K(()=>[j(k)]),_:1}))])]),g[0]||(g[0]=v("div",{class:"layout-mask"},null,-1))],2),j(wn)],64)}}},ei=Sn(qr,[["__scopeId","data-v-35351f52"]]);export{ei as default};
