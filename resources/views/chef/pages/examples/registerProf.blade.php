<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ICT-FOLLOW UP | Enregistrement</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    </head>
    <body class="hold-transition register-page">
		<div class="register-box">
			<div class="card card-outline card-primary">
				<div class="card-header text-center">
					<a href="{{ route('Dashboard_chef') }}" class="h1"><b>ICT </b>FOLLOW-UP</a>
				</div>
				<div class="card-body">
					<p class="login-box-msg">Enregistrer un professeur</p>

					<form action="{{ route('enregistrer.professeur') }}" method="post">
						@csrf
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="nomEns" placeholder="Nom du professeur">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="email" class="form-control" name="emailEns" placeholder="Email du professeur">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-envelope"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="password" class="form-control" name="mdpEns" placeholder="Mot de passe">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-8">
								<div class="icheck-primary">
									<input type="checkbox" id="agreeTerms" name="terms" value="agree">
									<label for="agreeTerms">
										Je confirme les <a href="#">informations</a>
									</label>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-5">
								<button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
							</div>
							<!-- /.col -->
						</div>
					</form>
				</div>
				<!-- /.form-box -->
			</div><!-- /.card -->
		</div>
		<!-- /.register-box -->

		<!-- jQuery -->
		<script src="../../plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="../../dist/js/adminlte.min.js"></script>
    </body>
</html>
