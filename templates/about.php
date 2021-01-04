<style type="text/css">
body
{
  background-color: #46178f;
  font-weight: 300;
}
.navbar-custom
{
  background-color: #f2f2f2;
  color: #333333;
}
</style>

<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" ng-click="landingPage()">Kvizli</a>
  <div class="collapse navbar-collapse navbar-custom" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item navbar-custom">
        <a class="nav-link" ng-click="loginPage()">Login</a>
      </li>
      <li class="nav-item navbar-custom">
        <a class="nav-link" ng-click="registerPage()">Register</a>
      </li>
      <li class="nav-item navbar-custom">
        <a class="nav-link" ng-click="aboutPage()">About</a>
      </li>
    </ul>
  </div>
</nav><br>
<table class="table table-bordered tableAbout">
  <thead>
    <tr>
      <th>PREDMET</th>
      <th>Skriptni programski jezici + Web programiranje na strani poslužitelja</th>
    </tr>
    <tr>
      <th>STUDENT</th>
      <th>DARIO PEŠEROVIĆ</th>
    </tr>
    <tr>
      <th>NAZIV ZADATKA</th>
      <th>Milijunaš</th>
    </tr>
    <tr>
      <th colspan="2">OPIS ZADATKA</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="2">
        Napisati program koji simulira igru "Milijunaš". Igra se sastoji od 15 pitanja koja se učitavaju iz baze pitanja zapisanih u bazi podataka. Svako pitanje treba sadržavati 4 moguća odgovora. Pragovi se nalaze na petom i desetom pitanju te osiguravaju natjecatelju minimalni iznos koji mogu osvojiti. Shema pitanja je sljedeća:
        <table align="center" class="table table-bordered tableAboutChild">
          <tr>
            <th>Redni broj pitanja</th>
            <th>Novčana vrijednost pitanja</th>
            <th>Težina pitanja</th>
          </tr>
          <tr>
            <td>1.</td>
            <td>100 kn</td>
            <td>1</td>
          </tr>
          <tr>
            <td>2.</td>
            <td>200 kn</td>
            <td>1</td>
          </tr>
          <tr>
            <td>3.</td>
            <td>300 kn</td>
            <td>1</td>
          </tr>
          <tr>
            <td>4.</td>
            <td>500 kn</td>
            <td>1</td>
          </tr>
          <tr style="background-color:#f2f2f2;color:#333333">
            <td>5.</td>
            <td>1000 kn</td>
            <td>2</td>
          </tr>
          <tr>
            <td>6.</td>
            <td>2000 kn</td>
            <td>2</td>
          </tr>
          <tr>
            <td>7.</td>
            <td>4000 kn</td>
            <td>3</td>
          </tr>
          <tr>
            <td>8.</td>
            <td>8000 kn</td>
            <td>3</td>
          </tr>
          <tr>
            <td>9.</td>
            <td>16000 kn</td>
            <td>4</td>
          </tr>
          <tr style="background-color:#f2f2f2;color:#333333">
            <td>10.</td>
            <td>32000 kn</td>
            <td>4</td>
          </tr>
          <tr>
            <td>11.</td>
            <td>64000 kn</td>
            <td>5</td>
          </tr>
          <tr>
            <td>12.</td>
            <td>125000 kn</td>
            <td>5</td>
          </tr>
          <tr>
            <td>13.</td>
            <td>250000 kn</td>
            <td>6</td>
          </tr>
          <tr>
            <td>14.</td>
            <td>500000 kn</td>
            <td>6</td>
          </tr>
          <tr style="background-color:#f2f2f2;color:#333333">
            <td>15.</td>
            <td>1000000 kn</td>
            <td>7</td>
          </tr>
        </table>
        Svako pitanje treba imati određenu težinu (npr. atribut težina) te se postavlja na odgovarajuću poziciju u igri. Nakon što se pokrene program prikazuje se početni izbornik:
      </td>
    </tr>
    <tr>
      <td colspan="2">1 - Nova igra <br>Kandidat upisuje svoje ime i prezime nakon čega mu se slijedno prikazuje pitanje po pitanje (u slučaju točnih odgovora). Ispod pitanja se treba prikazati forma za unos odgovora, te se nakon pritiska tipke ENTER ispisuje ishod: TOČNO ili NETOČNO. U slučaju netočnog odgovora kandidat osvaja iznos minimalnog prijeđenog praga. Nakon završetka igre potrebno u bazu podataka zapisati rezultat kandidata</td>
    </tr>
    <tr>
      <td colspan="2">2 - Rezultati kandidata <br>Prikaz svih kandidata koji su sudjelovali u igri, sortirani od kandidata koji su osvojili najveći iznos.</td>
    </tr>
  </tbody>
</table>
<br>