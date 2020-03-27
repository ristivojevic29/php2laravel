
<tr>
    <td>{{$k->idKorisnik}}</td>
    <td>{{$k->ime_korisnika}}</td>
    <td>{{$k->prezime_korisnika}}</td>
    <td>{{$k->email}}</td>
    <td>{{$k->lozinka}}</td>
    <td>{{$k->naziv_uloge}}</td>
    <td>
        <a style="color:#5a6169" data-id="{{$k->idKorisnik}}" class="btnObrisi" href=""><i class="fas fa-trash"></i></a>
        <a style="color:#5a6169" href="{{route("user.show",["id"=>$k->idKorisnik])}}"><i class="fas fa-edit"></i></a>
    </td>
</tr>

{{----}}
