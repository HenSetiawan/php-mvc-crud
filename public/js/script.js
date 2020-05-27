const btnUbah =document.querySelectorAll('.ubah');
const btnTambah=document.querySelector('.tambah')
const labelUbah =document.querySelector('#formModalLabel');
const btnSubmit=document.querySelector('.btnSubmit');



btnTambah.addEventListener('click',(e)=>{
    labelUbah.innerHTML="Tambah Data Mahasiswa";
    btnSubmit.innerHTML="Tambah Data"

        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');

  
})


btnUbah.forEach(e => e.addEventListener('click',function(){
    labelUbah.innerHTML="Ubah Data Mahasiswa";
    btnSubmit.innerHTML="Ubah data";
    document.querySelector('.modal-body form').setAttribute('action','http://localhost/mvc/public/mahasiswa/ubah')


    const id =event.target.dataset.id;


    

    $(function(){
       
        $.ajax({
            url: 'http://localhost/mvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {

                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
                
            }
        });
    })
    
}))





