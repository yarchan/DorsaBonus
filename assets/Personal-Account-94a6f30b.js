import{_ as u,r as c,o as s,c as a,a as t,F as m,b as f,d as l,n as p,w as v,e as x,t as h}from"./index-d764e368.js";const k="/assets/Instalation-8fb46039.png";const b={data(){return{instalation:k,titles:[{id:1,text:"Мои баллы",active:!0,link:"points"},{id:2,text:"Подарки",active:!1,link:"gifts"},{id:3,text:"Заказать подарки",active:!1,link:"order"},{id:4,text:"Пригласи друга",active:!1,link:"invate"},{id:5,text:"Задать вопрос",active:!1,link:"give_question"},{id:6,text:"Личные данные",active:!1,link:"personal_info"}]}},methods:{changeActive(i){this.titles.forEach(n=>{n.active=n.id===i.id})}}},g={class:"d-flex align-items-center justify-content-center pt-5"},w={class:"mb-4",style:{"max-width":"1170px",width:"100%"}},y={class:"mb-4 d-flex flex-wrap justify-content-start justify-content-md-between nav custom-border px-md-0 px-2 rounded-pill"},C=["onClick"];function A(i,n,V,$,o,r){const d=c("router-link"),_=c("RouterView");return s(),a("div",{class:"",style:p([`background-image: url(${o.instalation});`,{"min-height":"calc(100% - 140px - 3rem)"}])},[t("div",g,[t("div",w,[t("ul",y,[(s(!0),a(m,null,f(o.titles,e=>(s(),a("li",{class:"nav-item custom-border-link row text-nowrap me-md-3 me-3 mb-md-0 mb-3 rounded-pill child",key:e.id},[l(d,{to:`/personal-account/${e.link}`,style:{"text-decoration":"none"}},{default:v(()=>[t("a",{class:x(["nav-link fs-13 fw-semibold",e.active?"active":"unactive"]),onClick:j=>r.changeActive(e),href:"#"},h(e.text),11,C)]),_:2},1032,["to"])]))),128))]),l(_)])])],4)}const I=u(b,[["render",A],["__scopeId","data-v-2eddfbd8"]]);export{I as default};
