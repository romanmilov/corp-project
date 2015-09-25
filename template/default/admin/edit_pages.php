<td class="content">
	<h1>Էջի ավելացում</h1>	
	<form method="POST" action="/visitka/admin">
		<p><span>Էջի վերնագիրը &nbsp;
		</span><input class="txt-zag" type="text" name="title"></p>
		<p><span>Էջի պարունակությունը</span></p>
		<textarea rows="15" cols="60" name="text" id="text"></textarea>
		<br /><br />
		<p><span>Էջի դիրք &nbsp;
		</span><input class="txt-num" type="text" name="position"></p>
		<input type="image" src="images/save_btn.jpg" name="add">
	</form>
</td>
<td class="rightbar-adm">
	<h1>Էջերի ցանկ</h1>
		<div>
			<p><a href="/visitka/admin/id/1">Մեր մասին</a></p>
			<p><a href="/visitka/admin/id/2">Հետադարձ կապ</a></p>
			<p><a href="/visitka/admin/id/3">Գլխավոր</a></p>
			<br />							 
			<p><a href="/visitka/admin"><img src="images/add_btn.jpg" alt="Ավելացնել էջ" /></a></p>
		<p>Գլխավոր</p>
			<form method="POST" action="/visitka/admin">
				<select name="home_page">
					<option value="1">Մեր մասին</option>																		
					<option value="2">Հետադարձ կապ</option>																		
					<option value="3" selected="">Գլխավոր</option>
				</select>
				<br>
				<input type="image" src="images/update_btn.jpg" name="home">
			</form>	
				<br>
		<p>Հետադարձ կապ</p>
			<form method="POST" action="/visitka/admin">
				<select name="contacts">
					<option value="1">Մեր մասին</option>																		
					<option value="2" selected="">Հետադարձ կապ</option>																		
					<option value="3">Գլխավոր</option>																	
				</select>
				<br>
				<input type="image" src="images/update_btn.jpg" name="contacts_submit">
			</form>	
		</div> 
</td>