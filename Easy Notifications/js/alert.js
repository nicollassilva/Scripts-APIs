Alert={Welcome:function(){let e=["topLeft","topRight","bottomLeft","bottomRight"];for(i=0;i<e.length;i++){let t=document.createElement("div");t.classList.add("alert-"+e[i]),document.body.append(t)}},setAlert:function(e,t,n,a){if(["topLeft","topRight","bottomLeft","bottomRight"].indexOf(e)>-1)if(["success","danger","primary","warning"].indexOf(t)>-1){let o;switch(t){case"success":o="OK";break;case"danger":o="Error";break;case"primary":o="Info";break;case"warning":o="Caution"}id=$(".alert-"+e).children().length+1;let i=document.createElement("div");i.classList.add("alert-"+t),i.id=id;let l=document.createElement("i");l.classList.add("icon-"+t),i.append(l);let d=document.createElement("div");d.classList.add("timer"),i.append(d);let r=document.createElement("p");r.classList.add("caption"),r.textContent=o,i.append(r);let c=document.createElement("div");c.classList.add("text-alert"),c.textContent=n,i.append(c),$(".alert-"+e).append(i),$(".alert-"+e+" .alert-"+t+" .timer").animate({width:0,transition:"width",transitionDuration:a+"ms",transitionDelay:".5s"}),setTimeout(function(){document.querySelector(".alert-"+e).removeChild(i)},a+500)}else console.log("Tipo de alerta não encontrado.");else console.log("Posição não encontrada.")}},Alert.Welcome();
