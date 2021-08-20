<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h3>Add new</h3>

<div>
  <form action="{{ url('create_new_peserta') }}" method="post">
    @csrf
    <label for="fname">Nama</label>
    <input type="text" value="" name="nama" >

    <label for="lname">Nik</label>
    <input type="text" value="" name="nik" >
    
     <label for="lname">Dosis</label>
    <input type="text" value="" name="status_dosis" >

     <label for="lname">Tanggal reservasi</label>
    <input type="text" value="" name="tgl_reservasi" >

     <label for="lname">Slot</label>
    <input type="text" value="" name="slot" >

     <label for="lname">Note</label>
    <input type="text" value="" name="note" >

     <label for="lname">Email</label>
    <input type="text" value="" name="email" >
   
    <label for="lname">Hubungan keluarga</label>
    <input type="text" value="" name="hubungan_keluarga" >

     <label for="lname">Status</label>
    <input type="text" value="" name="status" >

     <label for="lname">Nip</label>
    <input type="text" value="" name="nip" >

     <label for="lname">No hp</label>
    <input type="text" value="" name="no_hp" >
    
     <label for="lname">Tempat lahir</label>
    <input type="text" value="" name="tempat_lahir" >

     <label for="lname">Jenis kelamin</label>
    <input type="text" value="" name="jenis_kelamin" >

     <label for="lname">Alamat ktp</label>
    <input type="text" value="" name="alamat_ktp" >

     <label for="lname">Status kawin</label>
    <input type="text" value="" name="status_kawin" >

     <label for="lname">Klinik</label>
    <input type="text" value="" name="klinik" >


<label for="lname">Lokasi</label>
    <input type="text" value="" name="lokasi" >

    <label for="lname">Cj</label>
    <input type="text" value="" name="cj" >


    <label for="lname">Ip</label>
    <input type="text" value="" name="ip" >

   
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
