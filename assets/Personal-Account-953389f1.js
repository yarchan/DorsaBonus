import{_ as u,r as c,o as s,c as a,a as t,F as m,b as p,d as l,n as v,w as f,e as x,t as k}from"./index-5a96e095.js";const h="/assets/Instalation-8fb46039.png";const b={data(){return{instalation:h,titles:[{id:1,text:"Мои баллы",active:!0,link:"points"},{id:2,text:"Подарки",active:!1,link:"gifts"},{id:3,text:"Заказать подарки",active:!1,link:"order"},{id:4,text:"Пригласи друга",active:!1,link:"invate"},{id:5,text:"Задать вопрос",active:!1,link:"give_question"},{id:6,text:"Личные данные",active:!1,link:"personal_info"}]}},methods:{changeActive(o){this.titles.forEach(n=>{n.active=n.id===o.id})}}},g={class:"d-flex align-items-center justify-content-center pt-5"},w={class:"mb-4",style:{"max-width":"1170px",width:"100%"}},y={class:"mb-4 d-flex justify-content-start justify-content-md-between nav custom-border px-md-0 px-3 rounded-pill"},C=["onClick"];function A(o,n,V,$,i,r){const d=c("router-link"),_=c("RouterView");return s(),a("div",{class:"",style:v([`background-image: url(${i.instalation});`,{"min-height":"calc(100% - 140px - 3rem)"}])},[t("div",g,[t("div",w,[t("ul",y,[(s(!0),a(m,null,p(i.titles,e=>(s(),a("li",{class:"nav-item custom-border-link row w-auto col-3 text-nowrap me-3 mb-md-0 mb-3 rounded-pill",key:e.id},[l(d,{to:`/personal-account/${e.link}`,style:{"text-decoration":"none"}},{default:f(()=>[t("a",{class:x(["nav-link fs-7 fw-semibold",e.active?"active":"unactive"]),onClick:j=>r.changeActive(e),href:"#"},k(e.text),11,C)]),_:2},1032,["to"])]))),128))]),l(_)])])],4)}const I=u(b,[["render",A],["__scopeId","data-v-8be771eb"]]);export{I as default};