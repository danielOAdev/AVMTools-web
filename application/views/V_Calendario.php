<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Tools</title>
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
		<link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/src/css/bootstrap.css">
		<link rel="stylesheet" href="/src/css/styles.css">
		
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
		<script src="/src/js/jquery.min.js"></script>
		<script src="/src/js/popper.min.js"></script>
		<script src="/src/js/bootstrap.min.js"></script>
	</head>
		<body>

		<div class="container-fluid">
			<div class="debug row justify-content-center">
				<h1>Header</h1>
			</div>
			<div class="dev row justify-content-center">
				Em desenvolvimento.
			</div>

			<div class="container main"> 

			<style>
			.grab { cursor: grab; }
			.grabbed { box-shadow: 0 0 13px #000; }
			.grabCursor, .grabCursor * { cursor: grabbing !important; }
			.inputQtd {width: 110; border: 0px}
			table{
				border-collapse: collapse
			}
			th, td {
				border: 1px solid black;
			}
			.btnRmv {color: #FF0000};
			</style>
			
			<div class="row">
				<div class="col">

					<p>DATA DE INÍCIO: <input id="calendario" type="date"></p>
					
					<a href="#" onclick="return AddDisciplina();"> + Disciplina </a>

					<table>
						<tbody id="disciplinas">
							<tr>
								<th><div style="visibility: hidden;">≡</div></th>
								<th>DISCIPLINA</th>
								<th>Nº DE AULAS</th>
								<th><div style="visibility: hidden;">❌</div></th>
							</tr>
						</tbody>
					</table>
					
					<div style="display:none;">
						<table>
							<tbody id="model_disc">
								<tr>
									<td class="grab">≡</td>
									<td class="data"><input type="text" value="DISCIPLINA"></td>
									<td class="data"><input class="inputQtd" type="number" value="4"></td>
									<td><a href="#" class="btnRmv" onclick="return RmvDisciplina(this);">❌</a></td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<a href="#" onclick="return getOutput();"> Calcular datas </a>
				</div>
				<div class="col">
					<select size="10">
					<option value="volvo">Volvo</option>
					<option value="saab">Saab</option>
					<option value="mercedes">Mercedes</option>
					<option value="audi">Audi</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div id="output"></div>
				</div>
			</div>

			<script>
				
				$(".grab").mousedown(grab);
				
				function AddDisciplina() {
					var model = document.getElementById("model_disc");
					$("#disciplinas").append(model.innerHTML).on('mousedown', 'td.grab', grab);
					return false;
				};
				
				function RmvDisciplina (e) {
					var tr = e.closest("tr");
					tr.remove();
					return false;
				};
				
				// handles the click event, sends the query
				function getOutput() {
					var calendario = document.getElementById("calendario").value;
					var tableInfo = Array.prototype.map.call(disciplinas.querySelectorAll('tr'), function(tr){
						return Array.prototype.map.call(tr.querySelectorAll('td.data'), function(td){
							var v = td.firstChild;
							return v.value;
						});
					});
					
					$.ajax({
						type : 'POST',
						url:'/C_Calendario/CalcDates/', 
						data: {"curso": tableInfo, "calendario": calendario},
                		dataType: 'html',
						complete: function (e) {
							$('#output').html(e.responseText);
						},
						error: function () {
							$('#output').html('Bummer: there was an error!');
						}
					});
					return false;
				}
				
				function grab (e) {
					var tr = $(e.target).closest("TR"), si = tr.index(), sy = e.pageY, b = $(document.body), drag;
					/* if (si == 0) return; */
					b.addClass("grabCursor").css("userSelect", "none");
					tr.addClass("grabbed");
					$(document).mousemove(move).mouseup(up);
					
					function move (e) {
						if (!drag && Math.abs(e.pageY - sy) < 10) return;
						drag = true;
						
						var cur = $(e.target).closest("TR"), tar = $(e.target);
						//if(!tar.is("TD") || cur == tr) return;
						var dir = Math.sign(cur.index() - tr.index());
						var next = tr.index()+(1*dir);
						var s = $("tr:eq("+next+")");
						if(s.index() == 0) return;
						var dist = s.offset().top+(s.height()/2);
						if (dir < 0 && (e.pageY<dist))
							s.insertAfter(tr);
						else if (dir > 0 && (e.pageY>dist))
							s.insertBefore(tr);
					}
					
					function up (e) {
						if (drag && si != tr.index()) {
							drag = false;
							//alert("moved!");
						}
						$(document).unbind("mousemove", move).unbind("mouseup", up);
						b.removeClass("grabCursor").css("userSelect", "auto");
						tr.removeClass("grabbed");
					}
				};
			</script>
			</div>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
		</div>
	</body>

</html>