@extends('templates.layout')

@push('css')
@endpush

@section('isi')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        
       
        <div class="card-body">
          <section class="content">

            <div class="card">
              <div class="card-header">
                <h3>Form</h3>
              </div>
              <div class="card-body">
                <form method="post" action="aksesoris" id="form-aksesoris">
                  <div class="form-row">
                    <label for="id" class="col-sm-2 col-form-label">No Transaksi</label>
                    <div class="form-group col-md-1">
                      
                      <input type="number" class="form-control" id="id" placeholder="Id" name="id" required>
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-2">
                    </div> <label for="nama" class="col-sm-2 col-form-label">Tanggal Beli</label>
                    <div class="form-group col-md-4">
                     
                      <input type="date" class="form-control" id="tanggal" placeholder="Tanggal Beli" name="tanggal" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <label for="telpon"class="col-sm-2 col-form-label">Barang Di beli</label>
                    <div class="form-group col-md-3">
                      <select class="custom-select" id="barang" name="barang">
                          <option selected disabled>Pilih barang</option>
                          <option value="gantungan" data-harga="5000">Gantungan Kunci</option>
                          <option value="ikat" data-harga="2500">Ikat Rambut</option>
                      </select>
                    </div>     
                      <input type="hidden" class="form-control" id="harga" placeholder="Harga" readonly name="harga" required let>
                    <div class="form-group col-md-1"></div>
                    <label for="telpon"class="col-sm-2 col-form-label">Warna</label>
                    <div class="form-group col-md-4">
                        <select class="custom-select" id="warna" name="warna">
                            <option selected disabled>Pilih warna</option>
                            <option value="Merah">Merah</option>
                            <option value="Hijau">Hijau</option>
                            <option value="kuning">Kuning</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword4" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="form-group col-md-2">
                      <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah"  min="0" step="1" value="0" required>
                    </div>
                    <div class="form-group col-md-2"></div>
                    <label for="nama" class="col-sm-2 col-form-label">Nama Pembeli</label>
                    <div class="form-group col-md-4">
                      <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
                    </div>
                  </div>&nbsp;
                 <div class="form-group row">
                  <label for="save" class="col-sm-4 col-form-label"></label>
                  <div class="col-sm-2">
                    <button type="button" class="form-control btn btn-primary" id="btn-insert">Submit</button>
                  </div>
                 </div>
                </form>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3>Data</h3>
              </div>
              <div class="card-body">
                <div class="mt-2 mb-2">
                  <div class="form-group row mt-2">
                    <div class="col-sm-2">
                       <button type="button" class="btn btn-success" id="btn-sorting">Urutkan</button>  
                    </div>
                    <div class="col-sm-4">
                      <input type="search" class="form-control" id="teks-cari">
                    </div>
                    <div class="col-sm-1">
                      <button type="button" id="btn-search" class="btn btn-secondary">Cari</button>
                    </div>
                    <style>
                      button {
                        background-color: #4c5eaf; /* warna latar belakang */
                        border: none; /* hilangkan border */
                        color: white; /* warna teks */
                        padding: 7px 18px; /* jarak padding */
                        text-align: center; /* teks rata tengah */
                        text-decoration: none; /* hilangkan underline */
                        display: inline-block; /* tampilkan inline */
                        font-size: 16px; /* ukuran font */
                        margin: 4px 2px; /* margin */
                        cursor: pointer; /* tampilkan cursor */
                        border-radius: 4px; /* bentuk border */
                      }
                    </style>
                    
                    <button onclick="window.print();">Cetak</button>
                    
                  </div>
                <table class="table table-bordered table-compact table-hover" id="data-aksesoris">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>Tanggal Beli</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Harga Barang</th>
                      <th>Warna</th>
                      <th>disc</th>
                      <th>total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="8" align="center">Belum Ada Data</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          
            
        </div>
    </section>
  
    <!-- /.content-wrapper -->

 
@endsection

@push('js')
<script>
  function insertData(dataaksesoris){
    const data = $('#form-aksesoris').serializeArray()

       // console.log(data)
       let newData = {}
       data.forEach(function(item, index){
         let name = item['name']
         let value = name === 'id' || name=='jumlah'? Number(item['value']) : item['value']
         newData[name] = value
       })
       console.log(newData)
 
       localStorage.setItem('dataaksesoris', JSON.stringify([...dataaksesoris, newData]))
       return newData
     }
 
   function showData(arr){
       let row = ''
       
       if(arr.length == 0){
         return row = `<tr><td colspan="8" align="center">Belum ada data</td></tr>`
       }

       let jmlBarang = jmlDiskon = jmlTotal=0 
       arr.forEach(function(item, index){
        let harga = item['barang'] === 'gantungan' ? 5000 : 2500
       
        let jmlHarga =harga *item['jumlah']
        let diskon = jmlHarga >= 30000 || jmlBarang >= 10 ? jmlHarga * 0.20 : 0;
        
        let total = jmlHarga - diskon
        jmlBarang += item['jumlah']
        jmlDiskon += diskon 
        jmlTotal += total
         row += `<tr>`
         row += `<td>${item['id']}</td>`
         row += `<td>${item['nama']}</td>`
         row += `<td>${item['tanggal']}</td>`
         row += `<td>${item['barang']}</td>`
         row += `<td>${item['jumlah']}</td>`
         row += `<td>${item['harga']}</td>`
         row += `<td>${item['warna']}</td>`
         row += `<td>${diskon}</td>`
         row += `<td>${total}</td>`
         row += `</tr>`

       })
       row += '<tr style="font-weight:bold; background:#000;color:white">'
         row += `<td colspan="4">Jumlah Total</td>`
         row += `<td>${jmlBarang}</td>`
         row += `<td>${jmlDiskon}</td>`
         row += `<td colspan ="3">${jmlTotal}</td>`
         row += '</tr>'
       return row
     }

     function sorting(arr,key){
      let i,  j, id, value; 
      for (i = 1; i < arr.length; i++)
      { 
          value = arr[i]; 
          id = arr[i][key]
          j = i - 1; 
          while (j >= 0 && arr[j][key] > id)
          { 
              arr[j + 1] = arr[j]; 
              j = j - 1;  
          } 
          arr[j + 1] = value; 
      } 
      return arr
    }
    function searching(arr, key, teks){
      for(let i= 0; i < arr.length; i++){
        if(arr[i][key] == teks)
          return i
        }
      return -1
    }

   $(function(){
     // initialize
     let dataaksesoris = JSON.parse(localStorage.getItem('dataaksesoris')) || []
     $('#data-aksesoris tbody').html(showData(dataaksesoris))
 
    //event klik input data
    $('#btn-insert').on('click',function(){
      //  e.prevantDefault()
         dataaksesoris.push(insertData(dataaksesoris)) 
         $('#data-aksesoris tbody').html(showData(dataaksesoris))
       })
 
    //event klik sorting
    $('#btn-sorting').on('click',function(){
        dataaksesoris = sorting(dataaksesoris, 'harga')

        $('#data-aksesoris tbody').html(showData(dataaksesoris))
      })

     //event klik searching
      $('#btn-search').on('click',function(){
        let teksSearch = $('#teks-cari').val()
        let id = searching(dataaksesoris,'barang', teksSearch)
        let data = []
        if(id >= 0)
          data.push(dataaksesoris[id])
        console.log(id)
        console.log(data)
        $('#data-aksesoris tbody').html(showData(data))
      })

      $('.filter').on('click', function(){
            const checked = [...document.querySelectorAll('.filter:checked')].map(e => e.value);
            const data = filter(dataaksesoris, checked)
            $('#data-aksesoris tbody').html(showData(data))
      })

      $('#barang').on('change', function(){
        //ambil data dari element option
        const harga = $('#barang option:selected').data('harga');

        $('[name=harga]').val(harga);
    })
 
    })

    </script>

@endpush