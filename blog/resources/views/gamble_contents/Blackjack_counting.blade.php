<!DOCTYPE html>
<html lang ='ja'>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<head>
	<meta charset = 'utf-8'>
	<title>CardCounting</title>
	<style>
		.card {
			width: 150px;
			height: 200px;
		}
		.table{
			width: 700px;
			height: 300px;
			table-layout: fixed;
		}
		.Historytable{
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<table border="1" class ="table">
			<thead>
				<tr>
					<th>A</th>
					<th>2</th>
					<th>3</th>
					<th>4</th>
					<th>5</th>
				</tr>
				<tr>
					<th>
						<img border="1" src="/img/A.jpg" id="card1" data-value = "1">
					</th>
					<th>
						<img border="1" src="/img/2.gif" id="card2" data-value = "2">
					</th>
					<th>
						<img border="1" src="/img/3.gif" id="card3" data-value = "3">
					</th>
					<th>
						<img border="1" src="/img/4.gif" id="card4" data-value = "4">
					</th>
					<th>
						<img border="1" src="/img/5.gif" id="card5" data-value = "5">
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<span class='rest1' id='rest1'>32</span>
					</td>
					<td>
						<span class='rest2' id='rest2'>32</span>
					</td>
					<td>
						<span class='rest3' id='rest3'>32</span>
					</td>
					<td>
						<span class='rest4' id='rest4'>32</span>
					</td>
					<td>
						<span class='rest5' id='rest5'>32</span>
					</td>
				</tr>
				<tr>
					<td>
						<span class="per1" id="per1">7.69</span>%
					</td>
					<td>
						<span class="per2" id="per2">7.69</span>%
					</td>
					<td>
						<span class="per3" id="per3">7.69</span>%
					</td>
					<td>
						<span class="per4" id="per4">7.69</span>%
					</td>
					<td>
						<span class="per5" id="per5">7.69</span>%
					</td>
				</tr>
			</tbody>
		</table>

		<br>
		<br>

		<table border="1" class ="table">
			<thead>
				<tr>
					<th>6</th>
					<th>7</th>
					<th>8</th>
					<th>9</th>
					<th>10</th>
				</tr>
				<tr>
					<th>
						<img border="1" src="/img/6.gif" id="card6" data-value="6">
					</th>
					<th>
						<img border="1" src="/img/7.gif" id="card7" data-value="7">
					</th>
					<th>
						<img border="1" src="/img/8.gif" id="card8" data-value="8">
					</th>
					<th>
						<img border="1" src="/img/9.gif" id="card9" data-value="9">
					</th>
					<th>
						<img border="1" src="/img/10.png" id="card10" data-value="10">
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<span class='rest6' id='rest6'>32</span>
					</td>
					<td>
						<span class='rest7' id='rest7'>32</span>
					</td>
					<td>
						<span class='rest8' id='rest8'>32</span>
					</td>
					<td>
						<span class='rest9' id='rest9'>32</span>
					</td>
					<td>
						<span class='rest10' id='rest10'>128</span>
					</td>
				</tr>
				<tr>
					<td>
						<span class="per6" id="per6">7.69</span>%
					</td>
					<td>
						<span class="per7" id="per7">7.69</span>%
					</td>
					<td>
						<span class="per8" id="per8">7.69</span>%
					</td>
					<td>
						<span class="per9" id="per9">7.69</span>%
					</td>
					<td>
						<span class="per10" id="per10">30.76</span>%
					</td>
				</tr>
			</tbody>
		</table>

		<span class="restall" id="restall">416</span>
		<br>
		[Hi/Low]<span class="count" id="count">0</span>


		<table border="1" >
			<tbody id="Historytable">
			</tbody>
		</table>
	</div>

	<!-- <table border="1" class="Historytable" id="Historytable">
		<tbody>
			<tr>
				<td width="40">
					<span class="countHistory1" id="countHistory1">aaa</span>
				</td>
				<td width="300">
					<span class="History1" id="History1">fff</span>
				</td>
			</tr>
			<tr>
				<td>
					<span class="countHistory2" id="countHistory2" width="80">bbb</span>
				</td>
				<td>
					<span class="History2" id="History2">ggg</span>
				</td>
			</tr>
			<tr>
				<td>
					<span class="countHistory3" id="countHistory3" width="80">ccc</span>
				</td>
				<td>
					<span class="History3" id="History3">hhh</span>
				</td>
			</tr>
			<tr>
				<td>
					<span class="countHistory4" id="countHistory4" width="80">ddd</span>
				</td>
				<td>
					<span class="History4" id="History4">iii</span>
				</td>
			</tr>
			<tr>
				<td>
					<span class="countHistory5" id="countHistory5" width="80">eee</span>
				</td>
				<td>
					<span class="History5" id="History5">jjj</span>
				</td>
			</tr>
		</tbody>
	</table>
 -->




	<script>
		var firststock = 52 * 8 / 13
		var cards = []
		var rests = []
		var percent = []
		var restall = document.getElementById("restall")
		var count = document.getElementById("count")

		for(var i = 1; i <= 10; i++){
			cards.push(document.getElementById("card"+i))
			rests.push(document.getElementById("rest"+i))
			percent.push(document.getElementById("per"+i))
		}
		
		//任意の桁で四捨五入する　valueに変更したい数値　右にどの桁でやるか ex,10なら0.1単位で四捨五入　100なら0.01単位で四捨五入
		function orgRound(value, base) {
    		return Math.round(value * base) / base;
		}
		
		// function WriteHistory(){
		// 	().insertAdjacentHTML("afterbegin","")
		// }


		function addtablerow(clickedElement){


			var Historytable = document.getElementById("Historytable")
			var historytable =` 
				<tr>
					<td width="40">
						<span class="countHistory"></span>
					</td>
					<td width="300">
						<span class="DoHistory"></span>
					</td>
				</tr>
				`
			var line = Historytable.rows.length;

			console.log(line)

			if(line <= 4){
				//上のHistorytableにテーブルのHTMLを挿入する処理
				Historytable.insertAdjacentHTML("afterbegin",historytable)
				var countHistories = document.getElementsByClassName("countHistory")
				var DoHistories = document.getElementsByClassName("DoHistory")

				console.log(countHistories)

				//そのテーブルHTMLにデータを挿入する処理
				countHistories[0].innerHTML = count.innerHTML;
				DoHistories[0].innerHTML = clickedElement.dataset.value+"をひいた";
			} else {
				//上のHistorytableにテーブルのHTMLを挿入する処理
				Historytable.insertAdjacentHTML("afterbegin",historytable)
				var countHistories = document.getElementsByClassName("countHistory")
				var DoHistories = document.getElementsByClassName("DoHistory")

				console.log(countHistories)

				//そのテーブルHTMLにデータを挿入する処理
				countHistories[0].innerHTML = count.innerHTML;
				DoHistories[0].innerHTML = clickedElement.dataset.value+"をひいた";
				
				Historytable.deleteRow(-1); 
			}



		}

		// function addtablerow() {
  //       	var table = document.getElementById("Historytable");
  //       // 行を行末に追加
  //       	var row = table.insertRow(-1);
  //       //td分追加
  //      		var cell1 = row.insertCell(-1);
  //       	var cell2 = row.insertCell(-1);
  //       // セルの内容入力
  //      		cell1.innerHTML = '行を追加しました';
  //      		cell2.innerHTML = 'この行を削除しますか？<input type="button" value=削除" id="coladd" onclick="coldel(this)">';
  //   }


		function drow(event){

			for(var i = 0; i <= 10; i++){
				if(event.toElement.id == "card"+(i+1)){
				rests[i].innerHTML = parseInt(rests[i].innerHTML) -1;
				for(var a = 0; a <= 9; a++){
					percent[a].innerHTML = orgRound(parseInt(rests[a].innerHTML) / parseInt(restall.innerHTML) * 100,100);
				}
				restall.innerHTML = parseInt(restall.innerHTML) -1;

				if(event.toElement.id == "card1" || 
					event.toElement.id == "card10"){
					count.innerHTML = parseInt(count.innerHTML) -1;
					}

				if(event.toElement.id == "card2" ||
					event.toElement.id == "card3" ||
					event.toElement.id == "card4" ||
					event.toElement.id == "card5" ||
					event.toElement.id == "card6"){
					count.innerHTML = parseInt(count.innerHTML) +1;
					}
				}
			}

			addtablerow(event.toElement)

		}


		for(i =0; i<=9; i++){
			cards[i].addEventListener('click', drow)
		}
	</script>
</body>
</html>