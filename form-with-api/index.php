<div class="form">
	<form class="appForm" method="post">
		Name:<br>
		<input type="text" name="name"><br>
		Phone:<br>
		<input type="text" name="phone"><br>
		<button>Send</button>
	</form>
	<p class="err"></p>
</div>
<script>
	let form = document.querySelector('.appForm');
	let error = document.querySelector('.err');

	form.addEventListener('submit', function(e) {
		e.preventDefault();

		let formData = new FormData(form);

		fetch('send.php', {
				method: 'POST',
				body: formData
			})
			.then(response => response.json())
			.then(data => {
				if (data.res) {
					form.textContent = 'Your request is send!';
					error.innerHTML = '<a href="index.php"> Move to main page </a>';
				} else {
					error.textContent = data.error;
				}
			})
	});
</script>
