<br>
<br>
<h5>Matricular Aluno</h5>
<br>
<br>
<form action="?page=save_aluno" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="form-group">
		<label>Selecione a Turma</label>
		<?php
			// select busca os dados na tabela
			// "*" quer dizer que busca TODOS os dados da tabela
			// guarda os dados na variável $sql
			$sql = "SELECT * FROM turma";
			// $res é a variável que tem a execução do $sql por meio da operação query
			// se a conexão estiver correta, realiza a operação query
			// se não, executa o or die, que é quando a conexão da erro
			$res = $conn->query($sql) or die($conn->error);
			// $qtd guarda a quantidade de linhas retornadas pela consulta
			$qtd = $res->num_rows;
			
			// se a quantidade for > 0 ele executa
			if($qtd > 0){
				print "<select name='turma_id_turma' class='form-control'>";
				print "<option> Selecione a Turma</option>";
				//  enquanto tiverem dados dentro; fetch_object retorna o valor atual e move o ponteiro um ponto adiante, retornando o proximo valor e percorrendo o vetor
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_turma."'>".$row->codigo_turma."</option>";
				}
				print "</select>";
				// se a quantidade não for > 0, é pq n existe nada naquela tabela ai imprime essa mensagem 
			}else{
				print "<div class='alert alert-danger'>Não há nenhum resultado</div>";
			}
		?>
	</div>
	<div class="form-group">
		<label>Nome do Aluno </label>
		<input type="text" placeholder="Neymar da Silva Santos Júnior" name="nome_aluno" class="form-control" required>
	</div>
	<div class="form-group">
		<label>CPF do Aluno </label>
		<input type="text" placeholder="Digite os 11 números do CPF sem ponto e sem traço" name="cpf_aluno" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Data de Nascimento do Aluno </label>
		<input type="text" placeholder="11/09/2001" name="data_nasc_aluno" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Nome do Responsável Pelo Aluno </label>
		<input type="text" placeholder="Edson Arantes do Nascimento" name="nome_responsavel" class="form-control" required>
	</div>
	<div class="form-group">
		<label>CPF do Responsável </label>
		<input type="text" placeholder="Digite os 11 números do CPF sem ponto e sem traço" name="cpf_responsavel" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Endereço Residencial do Aluno </label>
		<input type="text" placeholder="Rua Seleção Brasileira, Número 04, Bairro das Seleções, Brasília/DF CEP: 19541-970" name="endereco_aluno" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Telefone Para Contato </label>
		<input type="text" placeholder="(DDD)0-0000-0000" name="telefone_aluno" class="form-control" required>
	</div>
	<div class="form-group">
		<label>E-mail Para Contato </label>
		<input type="text" placeholder="neymar_barcelona@jogadores.com.br" name="email_aluno" class="form-control" required>
	</div>
	<div class="form-group">
		<button type="submit" style="width:100%;" class="btn btn-success">Cadastrar</button>
	</div>
</form>