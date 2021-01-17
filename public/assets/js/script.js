$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$('.btn-delete').on('click', function () {
    var id = $(this).data('id');
    var nama = $(this).data('nama');

    $('.id').val(id);
    $('.nama').val(nama);
});

$('.btn-terima').on('click', function () {
    var id = $(this).data('id');
    var nama = $(this).data('nama');

    $('.id').val(id);
    $('.nama').val(nama);
});


$('.btn-tolak').on('click', function () {
    var id = $(this).data('id');
    var nama = $(this).data('nama');

    $('.id').val(id);
    $('.nama').val(nama);
});


$('#tabelSiswa').DataTable();
$('#tabelGuru').DataTable();
$('#tabelSatpam').DataTable();
$('#tabelBerkunjung').DataTable();