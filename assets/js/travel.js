(function(){
 var payload=document.getElementById('mapData'); if(!payload)return;
 var data=JSON.parse(payload.textContent),routes=document.getElementById('routes'),points=document.getElementById('points'),ns='http://www.w3.org/2000/svg';
 function xy(a){return [(a.longitude+180)/360*1000,(90-a.latitude)/180*500]}
 function line(a,b,status){var p1=xy(a),p2=xy(b),x1=p1[0],y1=p1[1],x2=p2[0],y2=p2[1];if(Math.abs(x2-x1)>500){if(x1<x2)x1+=1000;else x2+=1000;}[-1000,0,1000].forEach(function(shift){var p=document.createElementNS(ns,'path');p.setAttribute('d','M '+(x1+shift)+' '+y1+' Q '+((x1+x2)/2+shift)+' '+(Math.min(y1,y2)-Math.abs(x2-x1)*.09)+' '+(x2+shift)+' '+y2);p.setAttribute('class','route '+status);routes.appendChild(p);});}
 data.segments.forEach(function(s){line(data.airports[s.from],data.airports[s.to],s.status)});Object.keys(data.airports).forEach(function(code){var a=data.airports[code],pos=xy(a),g=document.createElementNS(ns,'g');g.setAttribute('class','airport');g.innerHTML='<circle cx="'+pos[0]+'" cy="'+pos[1]+'" r="3"><title>'+code+' · '+a.city+'</title></circle>';points.appendChild(g)});
 var button=document.getElementById('togglePlanned');button.addEventListener('click',function(){var on=button.getAttribute('aria-pressed')==='true';button.setAttribute('aria-pressed',String(!on));document.body.classList.toggle('hide-planned',on);button.textContent=on?'Geplante einblenden':'Geplante ausblenden'});
}());
