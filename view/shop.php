<?php include_once("header.php");?>

<section ng-controller="destaque-controller">
	
	<div class="container" id="destaque-produtos-container">

		<div id="destaque-produtos">
			
			<div class="item" ng-repeat="produto in produtos">
				
				<div class="col-sm-6 col-imagem">
					<a href="produto-{{produto.id_prod}}">
						<img src="img/produtos/{{produto.foto_principal}}" height="250">
					</a>
				</div>
				<div class="col-sm-6 col-descricao">
					<h2>{{produto.nome_prod_longo}}</h2>
					<div class="box-valor">
						<div class="text-noboleto text-arial-cinza">no boleto por</div>
						<div><h2>R$ {{produto.preco_promorcional}}</h2></div>
						<div class="text-parcelas text-arial-cinza">ou em até {{produto.parcelas}} x de R$ {{produto.parcela}}</div>
						<div class="text-total text-arial-cinza">total a prazo R$ {{produto.total}}</div>	
					</div>
					<a href="carrinhoAdd-{{produto.id_prod}}" class="btn btn-comprar text-roxo"><i class="fa fa-shopping-cart"></i> compre agora</a>
				</div>

			</div>

		</div>

		<button type="button" id="btn-destaque-prev"><i class="fa fa-angle-left"></i></button>
		<button type="button" id="btn-destaque-next"><i class="fa fa-angle-right"></i></button>

	</div>


	<div id="mais-buscados" class="container">
		
		<div class="row text-center title-default-roxo">
			<h2>Produtos</h2>
			<hr><br>

		</div>

		<div class="row">
			
			<div class="col-md-3" ng-repeat="produto in buscados">
				<div class="box-produto-info">
					<a href="produto-{{produto.id_prod}}">
						<img src="img/produtos/{{produto.foto_principal}}" height="250" class="produto-img">
						<h3>{{produto.nome_prod_longo}}</h3>
						<div class="estrelas" data-score="{{produto.media}}"></div>
						<div class="text-qtd-reviews text-arial-cinza">({{produto.total_reviews}})</div>
						<div class="text-valor text-roxo">R$ {{produto.total}}</div>
						<div class="text-parcelado text-arial-cinza">{{produto.parcelas}}x de R$ {{produto.parcela}} sem juros</div>
					</a>
				</div>

			</div>

		</div>

	</div>

</section>

<?php include_once("footer.php");?>

<script>
angular.module("shop", []).controller("destaque-controller", function($scope, $http){

	$scope.produtos = [];
	$scope.buscados = [];

	var initCarousel = function(){

		$("#destaque-produtos").owlCarousel({
	 
	      autoPlay: 5000,
	      items : 1,
	      singleItem: true
	 
	  	});

	  	var owlDestaque = $("#destaque-produtos").data('owlCarousel');

	  	$('#btn-destaque-prev').on("click", function(){

	  		owlDestaque.prev();

	  	});

	  	$('#btn-destaque-next').on("click", function(){

	  		owlDestaque.next();

	  	});

	};

	$http({
	  method: 'GET',
	  url: 'produtos'
	}).then(function successCallback(response) {

	    $scope.produtos = response.data;

	    setTimeout(initCarousel, 1000);

	  }, function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	  });

	$http({
	  method: 'GET',
	  url: 'produtos-mais-buscados'
	}).then(function successCallback(response) {

	    $scope.buscados = response.data;

	  }, function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	  });

	

});
angular.module("shop", []).controller("destaque-controller", function($scope, $http){

	$scope.produtos = [];
	$scope.buscados = [];

	var initCarousel = function(){

		$("#destaque-produtos").owlCarousel({
	 
	      autoPlay: 5000,
	      items : 1,
	      singleItem: true
	 
	  	});

	  	var owlDestaque = $("#destaque-produtos").data('owlCarousel');

	  	$('#btn-destaque-prev').on("click", function(){

	  		owlDestaque.prev();

	  	});

	  	$('#btn-destaque-next').on("click", function(){

	  		owlDestaque.next();

	  	});

	};

	$http({
	  method: 'GET',
	  url: 'produtos'
	}).then(function successCallback(response) {

	    $scope.produtos = response.data;

	    setTimeout(initCarousel, 1000);

	  }, function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	  });

	var initEstrelas = function(){

		$('.estrelas').each(function(){

	  		$(this).raty({
		  		starHalf    : 'lib/raty/lib/images/star-half.png',                                // The name of the half star image.
				starOff     : 'lib/raty/lib/images/star-off.png',                                 // Name of the star image off.
				starOn      : 'lib/raty/lib/images/star-on.png',
				score		: parseFloat($(this).data("score"))
		  	});

	  	});

	};

	$http({
	  method: 'GET',
	  url: 'produtos-mais-buscados'
	}).then(function successCallback(response) {

	    $scope.buscados = response.data;

	    setTimeout(initEstrelas, 1000);

	  }, function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	  });

	

});
</script>