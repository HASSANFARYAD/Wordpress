!function(){var e={779:function(e,t){var n;
/*!
  Copyright (c) 2018 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/!function(){"use strict";var r={}.hasOwnProperty;function s(){for(var e=[],t=0;t<arguments.length;t++){var n=arguments[t];if(n){var o=typeof n;if("string"===o||"number"===o)e.push(n);else if(Array.isArray(n)){if(n.length){var a=s.apply(null,n);a&&e.push(a)}}else if("object"===o)if(n.toString===Object.prototype.toString)for(var i in n)r.call(n,i)&&n[i]&&e.push(i);else e.push(n.toString())}}return e.join(" ")}e.exports?(s.default=s,e.exports=s):void 0===(n=function(){return s}.apply(t,[]))||(e.exports=n)}()},334:function(){},655:function(){},378:function(e){var t=1e3,n=60*t,r=60*n,s=24*r,o=7*s,a=365.25*s;function i(e,t,n,r){var s=t>=1.5*n;return Math.round(e/n)+" "+r+(s?"s":"")}e.exports=function(e,l){l=l||{};var c=typeof e;if("string"===c&&e.length>0)return function(e){if((e=String(e)).length>100)return;var i=/^(-?(?:\d+)?\.?\d+) *(milliseconds?|msecs?|ms|seconds?|secs?|s|minutes?|mins?|m|hours?|hrs?|h|days?|d|weeks?|w|years?|yrs?|y)?$/i.exec(e);if(!i)return;var l=parseFloat(i[1]);switch((i[2]||"ms").toLowerCase()){case"years":case"year":case"yrs":case"yr":case"y":return l*a;case"weeks":case"week":case"w":return l*o;case"days":case"day":case"d":return l*s;case"hours":case"hour":case"hrs":case"hr":case"h":return l*r;case"minutes":case"minute":case"mins":case"min":case"m":return l*n;case"seconds":case"second":case"secs":case"sec":case"s":return l*t;case"milliseconds":case"millisecond":case"msecs":case"msec":case"ms":return l;default:return}}(e);if("number"===c&&isFinite(e))return l.long?function(e){var o=Math.abs(e);if(o>=s)return i(e,o,s,"day");if(o>=r)return i(e,o,r,"hour");if(o>=n)return i(e,o,n,"minute");if(o>=t)return i(e,o,t,"second");return e+" ms"}(e):function(e){var o=Math.abs(e);if(o>=s)return Math.round(e/s)+"d";if(o>=r)return Math.round(e/r)+"h";if(o>=n)return Math.round(e/n)+"m";if(o>=t)return Math.round(e/t)+"s";return e+"ms"}(e);throw new Error("val is not a non-empty string or a valid number. val="+JSON.stringify(e))}},28:function(e,t,n){"use strict";n.d(t,{P:function(){return d}});var r=n(896),s=n(307),o=n(18),a=n(818),i=n(694),l=n(736);n(462);const __=l.__,c="isInsertingPagePattern",u="automattic/full-site-editing/inserting-pattern";function d(e){const{setOpenState:t}=(0,a.useDispatch)("automattic/starter-page-layouts"),{setUsedPageOrPatternsModal:n}=(0,a.useDispatch)("automattic/wpcom-welcome-guide"),{replaceInnerBlocks:l}=(0,a.useDispatch)("core/block-editor"),{editPost:d}=(0,a.useDispatch)("core/editor"),{toggleFeature:p}=(0,a.useDispatch)("core/edit-post"),{disableTips:g}=(0,a.useDispatch)("core/nux"),m=(0,a.useSelect)((e=>{const{isOpen:t,isPatternPicker:n}=e("automattic/starter-page-layouts");return{isOpen:t(),isWelcomeGuideActive:e("core/edit-post").isFeatureActive("welcomeGuide"),areTipsEnabled:!!e("core/nux")&&e("core/nux").areTipsEnabled(),...n()&&{title:__("Choose a Pattern","full-site-editing"),description:__("Pick a pre-defined layout or continue with a blank page","full-site-editing")}}})),{getMeta:f,postContentBlock:h}=(0,a.useSelect)((e=>({getMeta:()=>e("core/editor").getEditedPostAttribute("meta"),postContentBlock:e("core/editor").getBlocks().find((e=>"a8c/post-content"===e.name))}))),C=(0,s.useCallback)((e=>{const t=f();d({meta:{...t,_starter_page_template:e}})}),[d,f]),v=(0,s.useCallback)(((e,t)=>{(0,i.addFilter)(c,u,(()=>!0)),e&&d({title:e}),l(h?h.clientId:"",t,!1),(0,i.removeFilter)(c,u)}),[d,h,l]),{isWelcomeGuideActive:b,areTipsEnabled:y}=m,w=(0,s.useCallback)((()=>{b?p("welcomeGuide"):y&&g()}),[y,g,b,p]),_=(0,s.useCallback)((()=>{n(),t("CLOSED")}),[t,n]);return(0,s.createElement)(o.Z,(0,r.Z)({},m,{onClose:_,savePatternChoice:C,insertPattern:v,hideWelcomeGuide:w},e))}},168:function(e,t,n){"use strict";var r=n(818);(0,r.registerStore)("automattic/starter-page-layouts",{reducer:function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"CLOSED",{type:t,...n}=arguments.length>1?arguments[1]:void 0;return"SET_IS_OPEN"===t?n.openState:e},actions:{setOpenState:e=>({type:"SET_IS_OPEN",openState:e||"CLOSED"})},selectors:{isOpen:e=>"CLOSED"!==e,isPatternPicker:e=>"OPEN_FOR_BLANK_CANVAS"===e}})},318:function(e,t,n){"use strict";var r=n(307),s=n(483),o=n(779),a=n.n(o),i=n(49),l=n.n(i),c=n(196);n(655);const u=l()("design-picker:mshots-image");const d=(e,t)=>{const[n,r]=(0,c.useState)(),[o,a]=(0,c.useState)(0),i=(0,c.useRef)(e),l=(0,c.useRef)(),d=(0,c.useRef)(),p=(0,c.useRef)(),g=(0,c.useRef)();return g.current=t,(0,c.useEffect)((()=>{(t!==g.current||e!==i.current&&l.current)&&(u("resetting mShotsUrl request"),e!==i.current&&u("src changed\nfrom",i.current,"\nto",e),t!==g.current&&u("options changed\nfrom",g.current,"\nto",t),p.current&&p.current.onload&&(p.current.onload=null,d.current&&(clearTimeout(d.current),d.current=void 0)),r(void 0),a(0),p.current=l.current,g.current=t,i.current=e);const n=function(e,t){let n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0;const r="https://s0.wp.com/mshots/v1/";return(0,s.addQueryArgs)(r+encodeURIComponent(e),{...t,count:n})}(e,t,o),c=new Image;return c.onload=()=>{400!==c.naturalWidth||300!==c.naturalHeight?r(c):o<10&&(d.current=setTimeout((()=>a((e=>e+1))),500*o))},c.src=n,l.current=c,()=>{l.current&&l.current.onload&&(l.current.onload=null),clearTimeout(d.current)}}),[e,o,t]),n};t.Z=e=>{let{url:t,"aria-labelledby":n,alt:s,options:o,scrollable:i=!1}=e;const l=d(t,o),c=(null==l?void 0:l.src)||"",u=!!c,p=(null==l?void 0:l.src)&&`url( ${null==l?void 0:l.src} )`,g=((null==l?void 0:l.naturalHeight)||600)/400,m={...i?{backgroundImage:p,transition:`background-position ${g}s`}:{}},f=a()("mshots-image__container",i&&"hover-scroll",u?"mshots-image-visible":"mshots-image__loader");return i||!u?(0,r.createElement)("div",{className:f,style:m,"aria-labelledby":n}):(0,r.createElement)("img",{className:f,style:m,src:c,alt:s,"aria-labelledby":n,alt:s})}},18:function(e,t,n){"use strict";var r=n(666),s=n(307),o=n(981),a=n(609),i=n(333),l=n(736),c=n(779),u=n.n(c),d=n(819),p=n(531),g=n(988),m=n(480),f=n(656),h=n(884),C=n(958);const __=l.__;class v extends s.Component{constructor(e){super(e),(0,r.Z)(this,"getBlocksByPatternSlugs",(0,d.memoize)((e=>{const t=e.reduce(((e,t)=>{let{name:n,html:r}=t;return e[n]=r?(0,o.parse)((0,f.Z)(r,this.props.siteInformation)):[],e}),{});return this.filterPatternsWithMissingBlocks(t)}))),(0,r.Z)(this,"getBlocksForSelection",(e=>{const t=this.getBlocksByPatternSlug(e);return(0,m.Z)(t,(function(e){return"core/button"===e.name&&void 0!==e.attributes.url&&(e.attributes.url="#"),e}))})),(0,r.Z)(this,"setPattern",(e=>{if((0,h.E2)(e),this.props.savePatternChoice(e),"blank"===e)return this.props.insertPattern("",[]),void this.props.onClose();const t=this.props.patterns.find((t=>t.name===e)),n=((null==t?void 0:t.categories)||{}).hasOwnProperty("home"),r=this.getBlocksForSelection(e),s=n?null:(null==t?void 0:t.title)||"";r&&r.length?(this.props.insertPattern(s,r),this.props.onClose()):this.props.onClose()})),(0,r.Z)(this,"handleCategorySelection",(e=>{this.setState({selectedCategory:e})})),(0,r.Z)(this,"closeModal",(()=>{(0,h.GI)(),this.props.onClose()})),(0,r.Z)(this,"getPatternGroups",(()=>{if(!this.props.patterns.length)return null;const e={};for(const t of this.props.patterns)for(const n in t.categories)n in e||(e[n]=t.categories[n]);return(0,g.x)(["featured","about","blog","home","gallery","services","contact"],e)})),(0,r.Z)(this,"getPatternsForGroup",(e=>{if(!this.props.patterns.length)return null;if("blank"===e)return[{name:"blank",title:"Blank",html:"",ID:null}];const t=[];for(const n of this.props.patterns)for(const r in n.categories)r===e&&t.push(n);return t})),(0,r.Z)(this,"getPatternCategories",(()=>{const e=this.getPatternGroups();if(!e)return null;const t=[];for(const n in e)t.push({slug:n,name:e[n].title});return t})),(0,r.Z)(this,"renderPatternGroup",(()=>{var e,t;const{selectedCategory:n}=this.state;if(!n)return null;const r=this.getPatternsForGroup(n);if(null==r||!r.length)return null;const s=null===(e=this.getPatternGroups())||void 0===e||null===(t=e[n])||void 0===t?void 0:t.title;return this.renderPatternsList(r,s)})),(0,r.Z)(this,"renderPatternsList",((e,t)=>{if(!e.length)return null;const n=this.getBlocksByPatternSlugs(this.props.patterns),r=Object.keys(n),o=(a=r,e.filter((e=>a.includes(e.name))));var a;return o.length?(0,s.createElement)(C.Z,{label:__("Layout","full-site-editing"),legendLabel:t,patterns:o,onPatternSelect:this.setPattern,theme:this.props.theme,locale:this.props.locale,siteInformation:this.props.siteInformation}):null})),this.state={selectedCategory:this.getDefaultSelectedCategory()}}filterPatternsWithMissingBlocks(e){return Object.entries(e).reduce(((e,t)=>{let[n,r]=t;return(0,p.Z)(r)&&r.length||(e[n]=r),e}),{})}componentDidMount(){this.props.isOpen&&this.trackCurrentView()}componentDidUpdate(e){!e.isOpen&&this.props.isOpen&&this.trackCurrentView(),(this.props.isWelcomeGuideActive||this.props.areTipsEnabled)&&this.props.hideWelcomeGuide()}trackCurrentView(){(0,h.Fk)("add-page")}getDefaultSelectedCategory(){const e=this.getPatternCategories();return null!=e&&e.length?e[0].slug:null}getBlocksByPatternSlug(e){var t;return(null===(t=this.getBlocksByPatternSlugs(this.props.patterns))||void 0===t?void 0:t[e])??[]}render(){var e,t;const{selectedCategory:n}=this.state,{isOpen:r,instanceId:o}=this.props;return r?(0,s.createElement)(a.Modal,{title:"",className:"page-pattern-modal",onRequestClose:this.closeModal,aria:{labelledby:`page-pattern-modal__heading-${o}`,describedby:`page-pattern-modal__description-${o}`}},(0,s.createElement)("div",{className:"page-pattern-modal__inner"},(0,s.createElement)("div",{className:"page-pattern-modal__sidebar"},(0,s.createElement)("h1",{id:`page-pattern-modal__heading-${o}`,className:u()("page-pattern-modal__heading",{"page-pattern-modal__heading--default":!this.props.title})},this.props.title||__("Add a page","full-site-editing")),(0,s.createElement)("p",{id:`page-pattern-modal__description-${o}`,className:"page-pattern-modal__description"},this.props.description||__("Pick a pre-defined layout or start with a blank page.","full-site-editing")),(0,s.createElement)("div",{className:"page-pattern-modal__button-container"},(0,s.createElement)(a.Button,{isSecondary:!0,onClick:()=>this.setPattern("blank"),className:"page-pattern-modal__blank-button"},__("Blank page","full-site-editing")),(0,s.createElement)("select",{className:"page-pattern-modal__mobile-category-dropdown",value:n??void 0,onChange:e=>this.handleCategorySelection(e.currentTarget.value)},null===(e=this.getPatternCategories())||void 0===e?void 0:e.map((e=>{let{slug:t,name:n}=e;return(0,s.createElement)("option",{key:t,value:t},n)})))),(0,s.createElement)(a.VisuallyHidden,{as:"h2",id:`page-pattern-modal__list-heading-${o}`},__("Page categories","full-site-editing")),(0,s.createElement)(a.NavigableMenu,{className:"page-pattern-modal__category-list",orientation:"vertical","aria-labelledby":`page-pattern-modal__list-heading-${o}`,onNavigate:(e,t)=>this.handleCategorySelection(t.dataset.slug??null)},null===(t=this.getPatternCategories())||void 0===t?void 0:t.map((e=>{let{slug:t,name:r}=e;return(0,s.createElement)(a.MenuItem,{key:t,isTertiary:!0,"aria-selected":t===n,"data-slug":t,onClick:()=>this.handleCategorySelection(t),className:"page-pattern-modal__category-button",tabIndex:t===n?void 0:-1},(0,s.createElement)("span",{className:"page-pattern-modal__category-item-selection-wrapper"},r))})))),(0,s.createElement)("div",{className:"page-pattern-modal__pattern-list-container"},this.renderPatternGroup()))):null}}t.Z=(0,i.withInstanceId)(v)},958:function(e,t,n){"use strict";var r=n(307),s=n(609),o=n(333),a=n(656),i=n(695);const l=()=>{};t.Z=(0,r.memo)((0,o.withInstanceId)((e=>{let{instanceId:t,label:n,legendLabel:o,patterns:c=[],theme:u="maywood",locale:d="en",onPatternSelect:p=l,siteInformation:g={}}=e;return Array.isArray(c)&&c.length?(0,r.createElement)(s.BaseControl,{id:`pattern-selector-control__${t}`,label:n,className:"pattern-selector-control"},(0,r.createElement)("ul",{className:"pattern-selector-control__options","data-testid":"pattern-selector-control-options","aria-label":o},c.map((e=>{let{ID:t,name:n,title:s,description:l}=e;return(0,r.createElement)("li",{key:`${t}-${n}-${o}`},(0,r.createElement)(i.Z,{value:n,title:(0,a.Z)(s,g),description:l,onSelect:p,patternPostID:t,theme:u,locale:d}))})))):null})))},695:function(e,t,n){"use strict";var r=n(307),s=n(318);t.Z=e=>{const{value:t,onSelect:n,title:o,description:a,theme:i,locale:l,patternPostID:c}=e;if(null==o||null==t)return null;const u=`https://public-api.wordpress.com/rest/v1/template/demo/${encodeURIComponent(i)}/${encodeURIComponent("dotcompatterns.wordpress.com")}/?post_id=${encodeURIComponent(c??"")}&language=${encodeURIComponent(l)}`,d=`pattern-selector-item__preview-label__${t}`,p=(0,r.createElement)(s.Z,{url:u,"aria-labelledby":d,alt:o,options:{vpw:1024,vph:1024,w:660,screen_height:3600},scrollable:!0});return(0,r.createElement)("button",{type:"button",className:"pattern-selector-item__label",value:t,onClick:()=>n(t)},(0,r.createElement)("span",{className:"pattern-selector-item__preview-wrap"},(0,r.createElement)("div",{className:"pattern-selector-item__preview-wrap-inner-position"},p)),(0,r.createElement)("div",{id:d},a))}},531:function(e,t){"use strict";t.Z=function e(t){return!!t.find((t=>"core/missing"===t.name||!(!t.innerBlocks||!t.innerBlocks.length)&&e(t.innerBlocks)))}},988:function(e,t,n){"use strict";function r(e,t){const n=Object.keys(t),r=e.filter((e=>n.includes(e))),s=n.filter((t=>!e.includes(t)));return r.concat(s.sort()).reduce(((e,n)=>(e[n]=t[n],e)),{})}n.d(t,{x:function(){return r}})},480:function(e,t,n){"use strict";var r=n(981);t.Z=function e(t,n){return t.map((t=>((t=n((0,r.cloneBlock)(t))).innerBlocks&&t.innerBlocks.length&&(t.innerBlocks=e(t.innerBlocks,n)),t)))}},656:function(e,t,n){"use strict";var r=n(736);const _x=r._x,s={Address:_x("123 Main St","default address","full-site-editing"),Phone:_x("555-555-5555","default phone number","full-site-editing"),CompanyName:_x("Your Company Name","default company name","full-site-editing"),Vertical:_x("Business","default vertical name","full-site-editing")},o={CompanyName:"title",Address:"address",Phone:"phone",Vertical:"vertical"};function a(e,t){return e in t}t.Z=function(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return e?e.replace(/{{(\w+)}}/g,((e,n)=>{const r=a(n,s)?s[n]:"",i=a(n,o)?o[n]:"";return t[i]||r||n})):""}},884:function(e,t,n){"use strict";n.d(t,{Z:function(){return s},Fk:function(){return o},GI:function(){return a},E2:function(){return i}}),window._tkq=window._tkq||[];let r=null;const s=e=>{r=e,window._tkq.push(["identifyUser",e.userid,e.username])},o=e=>{r&&window._tkq.push(["recordEvent","a8c_full_site_editing_template_selector_view",{blog_id:r.blogid,source:e}])},a=()=>{r&&window._tkq.push(["recordEvent","a8c_full_site_editing_template_selector_dismiss",{blog_id:r.blogid}])},i=e=>{r&&window._tkq.push(["recordEvent","a8c_full_site_editing_template_selector_template_selected",{blog_id:r.blogid,pattern:e}])}},49:function(e,t,n){t.formatArgs=function(t){if(t[0]=(this.useColors?"%c":"")+this.namespace+(this.useColors?" %c":" ")+t[0]+(this.useColors?"%c ":" ")+"+"+e.exports.humanize(this.diff),!this.useColors)return;const n="color: "+this.color;t.splice(1,0,n,"color: inherit");let r=0,s=0;t[0].replace(/%[a-zA-Z%]/g,(e=>{"%%"!==e&&(r++,"%c"===e&&(s=r))})),t.splice(s,0,n)},t.save=function(e){try{e?t.storage.setItem("debug",e):t.storage.removeItem("debug")}catch(n){}},t.load=function(){let e;try{e=t.storage.getItem("debug")}catch(n){}!e&&"undefined"!=typeof process&&"env"in process&&(e=process.env.DEBUG);return e},t.useColors=function(){if("undefined"!=typeof window&&window.process&&("renderer"===window.process.type||window.process.__nwjs))return!0;if("undefined"!=typeof navigator&&navigator.userAgent&&navigator.userAgent.toLowerCase().match(/(edge|trident)\/(\d+)/))return!1;return"undefined"!=typeof document&&document.documentElement&&document.documentElement.style&&document.documentElement.style.WebkitAppearance||"undefined"!=typeof window&&window.console&&(window.console.firebug||window.console.exception&&window.console.table)||"undefined"!=typeof navigator&&navigator.userAgent&&navigator.userAgent.toLowerCase().match(/firefox\/(\d+)/)&&parseInt(RegExp.$1,10)>=31||"undefined"!=typeof navigator&&navigator.userAgent&&navigator.userAgent.toLowerCase().match(/applewebkit\/(\d+)/)},t.storage=function(){try{return localStorage}catch(e){}}(),t.destroy=(()=>{let e=!1;return()=>{e||(e=!0,console.warn("Instance method `debug.destroy()` is deprecated and no longer does anything. It will be removed in the next major version of `debug`."))}})(),t.colors=["#0000CC","#0000FF","#0033CC","#0033FF","#0066CC","#0066FF","#0099CC","#0099FF","#00CC00","#00CC33","#00CC66","#00CC99","#00CCCC","#00CCFF","#3300CC","#3300FF","#3333CC","#3333FF","#3366CC","#3366FF","#3399CC","#3399FF","#33CC00","#33CC33","#33CC66","#33CC99","#33CCCC","#33CCFF","#6600CC","#6600FF","#6633CC","#6633FF","#66CC00","#66CC33","#9900CC","#9900FF","#9933CC","#9933FF","#99CC00","#99CC33","#CC0000","#CC0033","#CC0066","#CC0099","#CC00CC","#CC00FF","#CC3300","#CC3333","#CC3366","#CC3399","#CC33CC","#CC33FF","#CC6600","#CC6633","#CC9900","#CC9933","#CCCC00","#CCCC33","#FF0000","#FF0033","#FF0066","#FF0099","#FF00CC","#FF00FF","#FF3300","#FF3333","#FF3366","#FF3399","#FF33CC","#FF33FF","#FF6600","#FF6633","#FF9900","#FF9933","#FFCC00","#FFCC33"],t.log=console.debug||console.log||(()=>{}),e.exports=n(632)(t);const{formatters:r}=e.exports;r.j=function(e){try{return JSON.stringify(e)}catch(t){return"[UnexpectedJSONParseError]: "+t.message}}},632:function(e,t,n){e.exports=function(e){function t(e){let n,s,o,a=null;function i(){for(var e=arguments.length,r=new Array(e),s=0;s<e;s++)r[s]=arguments[s];if(!i.enabled)return;const o=i,a=Number(new Date),l=a-(n||a);o.diff=l,o.prev=n,o.curr=a,n=a,r[0]=t.coerce(r[0]),"string"!=typeof r[0]&&r.unshift("%O");let c=0;r[0]=r[0].replace(/%([a-zA-Z%])/g,((e,n)=>{if("%%"===e)return"%";c++;const s=t.formatters[n];if("function"==typeof s){const t=r[c];e=s.call(o,t),r.splice(c,1),c--}return e})),t.formatArgs.call(o,r);const u=o.log||t.log;u.apply(o,r)}return i.namespace=e,i.useColors=t.useColors(),i.color=t.selectColor(e),i.extend=r,i.destroy=t.destroy,Object.defineProperty(i,"enabled",{enumerable:!0,configurable:!1,get:()=>null!==a?a:(s!==t.namespaces&&(s=t.namespaces,o=t.enabled(e)),o),set:e=>{a=e}}),"function"==typeof t.init&&t.init(i),i}function r(e,n){const r=t(this.namespace+(void 0===n?":":n)+e);return r.log=this.log,r}function s(e){return e.toString().substring(2,e.toString().length-2).replace(/\.\*\?$/,"*")}return t.debug=t,t.default=t,t.coerce=function(e){if(e instanceof Error)return e.stack||e.message;return e},t.disable=function(){const e=[...t.names.map(s),...t.skips.map(s).map((e=>"-"+e))].join(",");return t.enable(""),e},t.enable=function(e){let n;t.save(e),t.namespaces=e,t.names=[],t.skips=[];const r=("string"==typeof e?e:"").split(/[\s,]+/),s=r.length;for(n=0;n<s;n++)r[n]&&("-"===(e=r[n].replace(/\*/g,".*?"))[0]?t.skips.push(new RegExp("^"+e.substr(1)+"$")):t.names.push(new RegExp("^"+e+"$")))},t.enabled=function(e){if("*"===e[e.length-1])return!0;let n,r;for(n=0,r=t.skips.length;n<r;n++)if(t.skips[n].test(e))return!1;for(n=0,r=t.names.length;n<r;n++)if(t.names[n].test(e))return!0;return!1},t.humanize=n(378),t.destroy=function(){console.warn("Instance method `debug.destroy()` is deprecated and no longer does anything. It will be removed in the next major version of `debug`.")},Object.keys(e).forEach((n=>{t[n]=e[n]})),t.names=[],t.skips=[],t.formatters={},t.selectColor=function(e){let n=0;for(let t=0;t<e.length;t++)n=(n<<5)-n+e.charCodeAt(t),n|=0;return t.colors[Math.abs(n)%t.colors.length]},t.enable(t.load()),t}},196:function(e){"use strict";e.exports=window.React},819:function(e){"use strict";e.exports=window.lodash},981:function(e){"use strict";e.exports=window.wp.blocks},609:function(e){"use strict";e.exports=window.wp.components},333:function(e){"use strict";e.exports=window.wp.compose},818:function(e){"use strict";e.exports=window.wp.data},307:function(e){"use strict";e.exports=window.wp.element},694:function(e){"use strict";e.exports=window.wp.hooks},736:function(e){"use strict";e.exports=window.wp.i18n},462:function(e){"use strict";e.exports=window.wp.nux},817:function(e){"use strict";e.exports=window.wp.plugins},483:function(e){"use strict";e.exports=window.wp.url},666:function(e,t,n){"use strict";function r(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}n.d(t,{Z:function(){return r}})},896:function(e,t,n){"use strict";function r(){return r=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},r.apply(this,arguments)}n.d(t,{Z:function(){return r}})}},t={};function n(r){var s=t[r];if(void 0!==s)return s.exports;var o=t[r]={exports:{}};return e[r](o,o.exports,n),o.exports}n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,{a:t}),t},n.d=function(e,t){for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})};var r={};!function(){"use strict";n.r(r);var e=n(307),t=n(884),s=n(818),o=n(817),a=n(28);n(168),n(334);const{templates:i=[],tracksUserData:l,screenAction:c,theme:u,locale:d}=window.starterPageTemplatesConfig??{};l&&(0,t.Z)(l),"add"===c&&(0,s.dispatch)("automattic/starter-page-layouts").setOpenState("OPEN_FROM_ADD_PAGE"),(0,o.registerPlugin)("page-patterns",{render:()=>(0,e.createElement)(a.P,{patterns:i,theme:u,locale:d}),icon:void 0})}(),window.EditingToolkit=r}();
//# sourceMappingURL=starter-page-templates.js.map