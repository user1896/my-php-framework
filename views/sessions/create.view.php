<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/main.php") ?>

<div>
	<p>
		Login big boy
	</p>
	<form action="sessions" method="POST">
		<label for="email">Email address</label>
		<input id="email" name="email" type="email" autocomplete="email" placeholder="Email Address" required>

		<!-- display email error -->
		<div>
			<?php if(isset($errors['email'])) : ?> <!-- if the error exists -->
				<p class="highlight-txt"><?= $errors['email'] ?></p> <!-- then display the error -->
			<?php endif ?>
		</div>

		<label for="password">password</label>
		<input id="password" name="password" type="password" autocomplete="current-password" required>

		<!-- display password error -->
		<div>
			<?php if(isset($errors['password'])) : ?> <!-- if the error exists -->
				<p class="highlight-txt"><?= $errors['password'] ?></p> <!-- then display the error -->
			<?php endif ?>
		</div>

		<button type="submit">Login</button>
	</form>
</div>

</body>
</html>