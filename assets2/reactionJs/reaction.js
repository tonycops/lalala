function InsertReaction (id_post,type,id) 
{
	var m_request = new XMLHttpRequest();
		m_request.open('GET', m_baseUrl+'cont_reaction/InsertReaction/'+id_post+'/'+type);
		m_request.onload = function(){
			var m_data = JSON.parse(m_request.responseText);
			console.log(m_data.msg);
			if(m_data.msg == 'OK'){
				document.getElementById(id).className = "animated bounce";
				var m_curTotal = document.getElementById("p"+id).innerHTML;
				m_curTotal = parseInt(m_curTotal);
				m_curTotal += 1;
				document.getElementById("p"+id).innerHTML = m_curTotal;
			}
		}
	m_request.send();
}