<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Brasileirão 2025</title>
   <link href="{{ asset('/css/index.css') }}" rel="stylesheet"> 
</head>
<body>
    <header>
        Brasileirão 2025
    </header>
    <main>
        <img src="/images/Campeonato_Brasileiro_Série_A_logo.png" alt="Logo do Brasileirão" class="logo">

        <p>Confira a tabela atualizada do Campeonato Brasileiro 2025</p>

        <table>
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Time</th>
                    <th>Pontos</th>
                    <th>Jogos</th>
                    <th>Vitórias</th>
                    <th>Empates</th>
                    <th>Derrotas</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td><td>Palmeiras</td><td>55</td><td>25</td><td>16</td><td>7</td><td>2</td><td>+20</td>
                </tr>
                <tr>
                    <td>2</td><td>Flamengo</td><td>52</td><td>25</td><td>15</td><td>7</td><td>3</td><td>+18</td>
                </tr>
                <tr>
                    <td>3</td><td>Atlético-MG</td><td>49</td><td>25</td><td>14</td><td>7</td><td>4</td><td>+15</td>
                </tr>
                <tr>
                    <td>4</td><td>São Paulo</td><td>46</td><td>25</td><td>13</td><td>7</td><td>5</td><td>+10</td>
                </tr>
                <tr>
                    <td>5</td><td>Corinthians</td><td>44</td><td>25</td><td>12</td><td>8</td><td>5</td><td>+8</td>
                </tr>
            </tbody>
        </table>

        <form>
            <label>Nome:</label>
            <input id="nome" name="nome" placeholder="Digite seu nome" required>

            <label>Email:</label>
            <input id="email" name="email" placeholder="Digite seu email" required>

            <button>Enviar</button>
        </form>
    </main>
</body>
</html>
