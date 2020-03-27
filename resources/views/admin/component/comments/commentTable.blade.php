<tr>
    <td>{{$k->ime_korisnika}}</td>
    <td>{{$k->prezime_korisnika}}</td>
    <td>{!! $k->komentar !!}</td>
    <td>{{$k->vreme}}</td>
    <td>{{$k->idArtikla}}</td>
    <td>
        <a style="color:#5a6169" data-id="{{$k->idKomentara}}" class="btnObrisi" href=""><i class="fas fa-trash"></i></a>
    </td>
</tr>
