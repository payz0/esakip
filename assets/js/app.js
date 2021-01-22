
let app = angular.module("app",['angular-js-xlsx','ui.bootstrap','angular-md5'])
.config(['$qProvider', function($qProvider,$sceProvider){
    $qProvider.errorOnUnhandledRejections(false);
    // $sceProvider.enabled(false);
 }])
app.controller("controlApp", function ($scope,$http,$q,$sce,md5){
    $scope.baseUrl;
    $scope.dataExcel = [];
    $scope.inputan = {}
    $scope.dialogBox = false;
    $scope.dataLaporan = {}
    $scope.allData = []
    $scope.allPegawai = []
    $scope.allLaporan = []
    $scope.jumData = 0
    $scope.i = null
    $scope.delTabel
    $scope.delId
    $scope.delField
    $scope.delBox = false;
    $scope.loading = false;
    // $scope.jumlahData = 0
    $scope.tahunNow = $scope.tahun = new Date().getFullYear();
    // $scope.alert //= alert;
    $scope.bulan = new Date().getMonth();
    $scope.uploadIki = false;
    $scope.editPegawai = false;

    
    

   //==========================================================================================
    //************* method untuk DATA JABATAN ***************/
    //==========================================================================================
    $scope.dataKabag = []
    $scope.dataKasi = [] 

    $scope.editData = function(field,tabel,data,i){
        if(tabel == 'tabel_kabag'){
            $scope.i = i
            $scope.edit =  !$scope.edit
            $scope.edit2 = false
        }else{
            $scope.i = i
            $scope.edit = false
            $scope.edit2 =  !$scope.edit2
        }
        
        
        $scope.$applyAsync(()=>{
            if(!$scope.edit && !$scope.edit2){
                $scope.update(field,tabel,(tabel=='tabel_kabag')? data.id_kabag : data.id_kasi,data)
                // $scope.i = null;
            }
        })
    }

    $scope.hapusJabatan = function(tabel,id,field){
        let tabelExc,fieldExc;

        if(tabel == "tabel_kabag"){
            tabelExc = 'tabel_kasi';
            fieldExc = 'id_kabag';
        }else{
            tabelExc = 'tabel_pegawai';
            fieldExc = 'id_kasi';
        }
        $scope.getSatu(tabelExc,id, fieldExc).then((dat)=>{
            if(dat.length == 0){
                if(tabel == "tabel_kabag"){
                    $scope.getSatu('tabel_pegawai',id, 'id_kabag').then((kab)=>{
                        if(kab.length == 0){
                            $scope.deleteData(tabel,id,field).then(()=>{
                                $scope.getDuaJabatan();
                            })
                        }else{
                            $scope.notify("Gagal hapus, ada data lain yang terkait")   
                        }
                    })
                }else{
                    $scope.deleteData(tabel,id,field).then(()=>{
                        $scope.getDuaJabatan();
                    })
                }
            }else{
                $scope.notify("Gagal hapus, ada data lain yang terkait")
            }
        },(noData)=>{
                $scope.deleteData(tabel,id,field).then(()=>{
                    $scope.getDuaJabatan();
                })
        })
      
    }

    // ambil data dari get satu
    $scope.getJabatan = function(){
        console.log($scope.inputan)
        $scope.getSatu('tabel_kabag',$scope.id_skpd,'id_skpd').then((data)=>{
            $scope.$applyAsync(()=>{
                $scope.dataKabag = data;
            })
        })
    }

    // dobel data tabel dalam satu metod 
    $scope.getDuaJabatan = function(){
        $scope.getSatu('tabel_kabag',$scope.id_skpd,'id_skpd').then((data)=>{
            $scope.$applyAsync(()=>{
                $scope.dataKabag = data;
                $scope.jumData = data.length
            })
        })
        $scope.getSatu('tabel_kasi',$scope.id_skpd,'id_skpd').then((data)=>{
            $scope.$applyAsync(()=>{
                $scope.dataKasi = data;
            })
        })
    }

    // tambah data jabatan
    $scope.tambahJabatan = function(tabel,data){
        if(data.id_kabag == "" || data.kasi == "" ||
         tabel == 'tabel_kabag' && data.kabag == undefined || tabel == 'tabel_kabag' && data.kabag == ""){
            $scope.notify("Data harus di isi semua")
            $scope.inputan = {}
            $scope.inputan.id_skpd = $scope.id_skpd;
            
        }else{   
            $scope.tambah(tabel,data).then((da)=>{
                    $scope.dialogBox = false
                    $scope.jabBox = false;
                    $scope.inputan = {};
                    if(tabel == 'tabel_kabag'){
                        $scope.getSatu('tabel_kabag',$scope.id_skpd,'id_skpd').then((data)=>{
                            $scope.$applyAsync(()=>{
                                $scope.dataKabag = data;
                                $scope.jumData = data.length
                            })
                        })
                        
                    }else{
                        $scope.getSatu('tabel_kasi',$scope.id_skpd,'id_skpd').then((data)=>{
                            $scope.$applyAsync(()=>{
                                $scope.dataKasi = data;
                            })
                        })
                    }
            })
        }
    }
   
    //==========================================================================================
    //********************METHOD DATA PEGAWAI *****************
    //==========================================================================================
    console.log('terbaru')
    $scope.getMeLap = function(id){
        let ind = $scope.allLaporan.findIndex((a)=>{return a.id_peg == id && a.tahun == $scope.tahun})
        return $scope.allLaporan[ind]
    }
  

    $scope.viewJabatan = function(data,i){
        let pass = "123456";
        delete $scope.dataExcel[i].atasan;
        delete  $scope.dataExcel[i].id_kasi;
        delete  $scope.dataExcel[i].id_kabag;
        $scope.dataExcel[i].password = $scope.md5(pass);
        $scope.dataExcel[i].id_skpd = $scope.id_skpd;
        try{
        let src = JSON.parse(data) 
        $scope.$applyAsync(()=>{
            $scope.dataExcel[i].jabatan = src.jab;
            $scope.dataExcel[i].esselon = src.esselon;
            $scope.dataExcel[i].id_kabag = src.id_kabag;
            if(src.esselon == "esselon IV"){
                let ind = $scope.dataKabag.findIndex((a)=>{ return a.id_kabag == $scope.dataExcel[i].id_kabag })
                $scope.dataExcel[i].atasan = $scope.dataKabag[ind].kabag
                $scope.dataExcel[i].id_kasi = src.id_kasi;
            }
        })
        }catch{
            if(data == "Kepala Dinas" || data == "Inspektur"){  
                $scope.dataExcel[i].esselon = 'esselon II';
            }
            $scope.dataExcel[i].jabatan = data;
        }
    }

    $scope.viewKasi = function(data,i){
        delete $scope.dataExcel[i].atasan;
        delete $scope.dataExcel[i].esselon;
        let src = JSON.parse(data)
        $scope.dataExcel[i].id_skpd = $scope.id_skpd;
        $scope.dataExcel[i].id_kasi = src.id_kasi;
        $scope.dataExcel[i].id_kabag = src.id_kabag;
        // console.log($scope.dataExcel[i])
    }

    $scope.simpanPegawai = function(){
        let cek = false;
        $scope.dataExcel.forEach((val,key)=>{
            if(val.atasan != undefined){
                delete $scope.dataExcel[key].atasan;
            }
            if(val.jabatan == undefined || val.jabatan == ""){
                cek = true;
            }else if(val.jabatan == "Staf"){
                if(val.id_kasi == undefined || val.id_kasi == ""){
                    cek = true
                }
            }
            if($scope.dataExcel.length == key+1){
                if(cek){
                    $scope.notify("Jabatan tidak boleh kosong")
                }else{
                    $scope.dataExcel.forEach((vl,ky)=>{
                        $scope.tambah('tabel_pegawai',vl).then(()=>{
                            $scope.dialogBox = false;
                        })
                        if($scope.dataExcel.length == ky+1){
                            setTimeout(()=>{
                                $scope.$applyAsync(()=>{
                                    $scope.tampilPegawai();
                                })
                            },500)
                            
                        }
                    })
                    
                }
            }
        })
        // console.log($scope.dataExcel)
    }
    // console.log('ssss')
    $scope.tampilPegawai = function(){
        $scope.allData = []
        $scope.getSatu('tabel_pegawai',$scope.id_skpd,'id_skpd').then((data)=>{
            // console.log(data)
            // $scope.pagination(data);
            $scope.allData = data;
            
        })
    }

    

    //return password
    $scope.hash  = function(data){
        return atob(data).substr(0,atob(data).length-4)
    }
    console.log('baruuuu')

    $scope.editPeg = function(data){
        $scope.inputan = data;
        $scope.getDuaJabatan();
    }

    
    $scope.cekJabatan = function(data, jabatan){
         data.jabatan = null;
         data.id_kabag = null;
         data.id_kasi = null;
         data.esselon = null;
        // console.log(data)
        try{
            let dataJab = JSON.parse(jabatan)
            data.esselon = dataJab.esselon
            
             if(dataJab.esselon == "esselon III"){
                data.id_kabag = dataJab.id_kabag
                data.jabatan = dataJab.kabag
             }else{
                data.id_kabag = dataJab.id_kabag
                data.id_kasi = dataJab.id_kasi
                data.jabatan = dataJab.kasi
             }
             $scope.inputan = data;
            console.log(data)
        }catch{
            if(jabatan == "Kepala Dinas" || jabatan == 'Inspektur'){
                data.jabatan = jabatan;
                data.esselon = "esselon II"
            }

            console.log(data);
            $scope.inputan = data;
        }
    }

    $scope.cekAtasan = function(data, data2){
        let dat = JSON.parse(data2)
         data.jabatan = null;
         data.id_kabag = null;
         data.id_kasi = null;
         data.esselon = null;
        data.id_kabag = dat.id_kabag
        data.id_kasi = dat.id_kasi
        data.jabatan = "Staf"        
        console.log(data); 
        $scope.inputan = data;  
    }
    
    $scope.hapusPegawai = function(i){
        $scope.$applyAsync(()=>{
            $scope.delTabel = "tabel_pegawai"
            $scope.delId = i
            $scope.delField = 'id_peg'
            $scope.delBox = true;
        })
    }

    $scope.pegawaiBaru = function(){
        $scope.inputan.id_skpd = $scope.id_skpd;
        if($scope.inputan.jabatan == null){
            $scope.notify("Semua harus di isi termasuk form atasan")
        }else{
            $scope.inputan.password = $scope.md5($scope.inputan.password)
            $scope.tambah('tabel_pegawai',$scope.inputan).then(()=>{
                $scope.tampilPegawai()
                $scope.inputan = {}
                $scope.addForm()
            })
        }
        // console.log($scope.inputan)
    }
    
    $scope.reload = function(i){
        $scope.$applyAsync(()=>{
            $scope.editPegawai = true;
            $scope.adding = !$scope.adding;
            // $scope.i = i;
        })
    }
    $scope.simpanEdit = function(){
        $scope.$applyAsync(()=>{
            let id = $scope.inputan.id_peg;
            if($scope.inputan.password == "" || $scope.inputan.password == null ||
                $scope.inputan.nip == "" || $scope.inputan.nip == null ||
                $scope.inputan.jabatan == "" || $scope.inputan.jabatan == null
            ){
                $scope.notify("Maaf, Harap isi semua")
            }else{
                $scope.inputan.password = $scope.md5($scope.inputan.password)
                $scope.update('id_peg','tabel_pegawai',id,$scope.inputan).then(()=>{
                    $scope.inputan = {}
                    $scope.editPegawai = !$scope.editPegawai;
                    $scope.adding = !$scope.adding;
                    // $scope.reload($scope.editPegawai)
                })
            }
            
        })
        
    }

    //==========================================================================================
    //********************METHOD DATA LAPORAN SKPD dan Kab*****************
    //==========================================================================================
    $scope.hapusLaporan = function(id){
        $scope.allData = []
        $scope.deleteData('tabel_laporan',id,'id_lap').then(()=>{
            $scope.getAlt2('tabel_laporan','id_skpd',$scope.id_skpd,'id_peg',$scope.id_pegawai).then((data)=>{
                $scope.allData = data;
            })
        })
    }

    $scope.hapusLaporans = function(tabel,id){
        $scope.allData = []
        $scope.deleteData(tabel,id,'id_lap_skpd').then(()=>{
            setTimeout(() => {
                $scope.$applyAsync(()=>{
                    location.reload();
                })
            }, 1000);
        })
    }
    
    console.log('hapus nas123')
    $scope.uploadDoc = function() {
        $scope.$applyAsync(()=>{
            $("#form1").submit();
        })
    };

    $scope.getGlobalLap = function(data,id){
        let i = data.findIndex((a)=>{return a.id_peg == id})
        return data[i];
    }
    $scope.i = 0
    $scope.urut = function(){
        return $scope.i++;
    }

    console.log('mendawai1130000')

    $scope.descEdit = function(data,nilai = null){
        $scope.$applyAsync(()=>{
            $scope.desc = data;
        })
        if(nilai != null){
            if($scope.jenis_lap == 'skpd'){
                nilai.id_skpd = $scope.id_skpd    
            }
            // else{
            //     nilai.id_skpd = null
            // }
            nilai.jenis_lap = $scope.jenis_lap
            nilai.tahun = $scope.tahun
            $scope.simpanDesc(nilai)
        }
        
    }
    $scope.berkas = null
    
    $scope.editKab = function(berkas){
        $scope.$applyAsync(()=>{
            $scope.berkas = berkas;
        })
    }

    
    $scope.dataTahun = function(){
        if($scope.jenis_lap != 'kabupaten'){
            $scope.getSatuDua('tabel_laporan_skpd',$scope.id_skpd,'id_skpd','tahun',$scope.tahun,'jenis_lap',$scope.jenis_lap).then((data)=>{
                $scope.jumlahLaporan = data.length
                $scope.inputan = data[0]
            })
            // if($scope.global != undefined){
            //     $scope.$applyAsync(()=>{
            //     $scope.grafik($scope.global.id_skpd)
            //     // console.log($scope.global.id_skpd)
            //     })
            // }
        }else{
            $scope.getAlt2('tabel_laporan_skpd','tahun',$scope.tahun,'jenis_lap',$scope.jenis_lap).then((data)=>{
                $scope.jumlahLaporan = data.length
                $scope.inputan = data[0]
            })
        }
    }

    // revisi terbaru
    $scope.dataTahuns2 = function(){
        if($scope.jenis_lap != 'kabupaten'){
            $scope.getSatuDua('tabel_laporan_skpd',$scope.id_skpd,'id_skpd','tahun',$scope.tahun,'jenis_lap',$scope.jenis_lap).then((data)=>{
                $scope.jumlahLaporan = data.length
                $scope.laporans = data;
            })
        }else{
            $scope.getAlt2('tabel_laporan_skpd','tahun',$scope.tahun,'jenis_lap',$scope.jenis_lap).then((data)=>{
                $scope.jumlahLaporan = data.length;
                $scope.laporans = data;
                console.log(data)
                // $scope.inputan = data[0]
            })
        }
    }
    

    $scope.simpanDesc = function(datas){
        // console.log(datas)
        if($scope.jumlahLaporan == 0){
            $scope.tambah('tabel_laporan_skpd',datas).then(()=>{
                $scope.dataTahun();
            })
        }else{
            $scope.update('id_lap_skpd','tabel_laporan_skpd',$scope.inputan.id_lap_skpd,datas).then(()=>{
                // console.log('update')
                $scope.dataTahun();
            })
            
            // $scope.update('')
        }
    }
    

    $scope.getLaporans = function(data,data2){
        let dat = $scope.laporans.filter((a)=>{return a[data] != null || a[data2] != null})
        // let inde = $scope.laporans.findIndex((a)=>{return a[data] != null })
        // if($scope.laporans[inde] != undefined){
            // console.log(dat)
            return dat;
        // }
    }
    console.log("=== new 4==")
    //==========================================================================================
    //********************LAPORN individu*****************
    //==========================================================================================
    $scope.homeTotal = function(type,field,id=null){
        // $scope.$(()=>{
            let ind;
            let jumFill;
            if(id == null){ // untuk kabupaten
                 ind = $scope.allLaporan.findIndex((a)=>{ return a.tahun == $scope.tahun && a.jenis_lap == type && a[field] != null})
                 jumFill = $scope.allLaporan.filter((a)=>{ return a.tahun == $scope.tahun && a.jenis_lap == type && a[field] != null})
            }else{
                ind = $scope.allLaporan.findIndex((a)=>{ return a.id_skpd == id && a.tahun == $scope.tahun && a.jenis_lap == type && a[field] != null})
                jumFill = $scope.allLaporan.filter((a)=>{ return a.id_skpd == id && a.tahun == $scope.tahun && a.jenis_lap == type && a[field] != null})
            }
            if($scope.allLaporan[ind] != undefined){
                jumFill[jumFill.length - 1].tgl = new Date(jumFill[jumFill.length - 1].tgl)
                // aslinya === >
                // $scope.allLaporan[ind].tgl = new Date($scope.allLaporan[ind].tgl)
            }
            return jumFill[jumFill.length - 1];
            // aslinya ====>
            // return $scope.allLaporan[ind];
            // console.log($scope.allData[ind])
        // })
    }


    $scope.dataIki = function(tahun,tri){
        // $scope.$(()=>{
            let ind = $scope.allData.filter((a)=>{ return a.tahun == tahun && a.triwulan == tri})
            if($scope.allData[ind] != undefined){
                $scope.allData[ind].tgl = new Date($scope.allData[ind].tgl)
            }
            // return $scope.allData[ind];
            // console.log($scope.allData[ind])
            return ind;
            // console.log(ind)
        // })
    }

    $scope.convTgl = function(tgl){
        return new Date(tgl);
    }

    

    $scope.allDataIki = function(id,tahun,tri){
        // $scope.$(()=>{
        
            let ind = $scope.allData.findIndex((a)=>{ return a.id_peg == id && a.tahun == tahun && a.triwulan == tri})
            if($scope.allData[ind] != undefined){
                $scope.allData[ind].tgl = new Date($scope.allData[ind].tgl)
            }
            return $scope.allData[ind];
            // console.log($scope.allData[ind])
        // })
        
    }

    $scope.allDataIkis = function(id,tahun,tri){
        // $scope.$(()=>{
            let ind = $scope.allLaporan.findIndex((a)=>{ return a.id_peg == id && a.tahun == tahun && a.triwulan == tri})
            let filter = $scope.allLaporan.filter((a)=>{ return a.id_peg == id && a.tahun == tahun && a.triwulan == tri})
            if($scope.allLaporan[ind] != undefined){
                filter[filter.length - 1].tgl = new Date(filter[filter.length - 1].tgl)
                // $scope.rencAksis = filter;
                // $scope.allLaporan = $scope.allLaporan[ind];
            }
            return filter[filter.length - 1];//
            
            // console.log($scope.allData[ind])
        // })
    }

    $scope.allDataIkis2 = function(id,tahun,tri,nama){
        // $scope.$(()=>{
            // $scope.rencAksis = []
            let ind = $scope.allLaporan.findIndex((a)=>{ return a.id_peg == id && a.tahun == tahun && a.triwulan == tri})
            let filter = $scope.allLaporan.filter((a)=>{ return a.id_peg == id && a.tahun == tahun && a.triwulan == tri})
            if($scope.allLaporan[ind] != undefined){
                // filter[filter.length - 1].tgl = new Date(filter[filter.length - 1].tgl)
                $scope.rencAksis = filter;
                $scope.namas = nama
            }
            
            // return filter[filter.length - 1];//$scope.allLaporan[ind];
            // console.log($scope.allData[ind])
        // })
    }

    $scope.cekUpIki = function(){
        if($scope.allDataIki($scope.id_pegawai,$scope.tahun,$scope.dataTri) != undefined){
            $scope.$applyAsync(()=>{
                
                    if($scope.allDataIki($scope.id_pegawai,$scope.tahun,$scope.dataTri).status != 'terima'){
                        $scope.uploadIki = true;
                    }else{
                        alert('Data triwulan ke '+$scope.dataTri+' tahun '+$scope.tahun+' anda sudah di terima, jangan di rubah')
                        $scope.uploadIki = false;   
                    }
            
                console.log($scope.uploadIki)
            })
        }else{
            $scope.$applyAsync(()=>{
                $scope.uploadIki = true;
            })
        }
    }

    $scope.cekFileIKI = function(){
        // if($scope.allDataIki($scope.id_pegawai,$scope.tahun,$scope.dataTri) != undefined){
        //     $scope.$applyAsync(()=>{
                
        //             if($scope.allDataIki($scope.id_pegawai,$scope.tahun,$scope.dataTri).status != 'terima'){
        //                 $scope.uploadIki = true;
        //             }else{
        //                 alert('Data triwulan ke '+$scope.dataTri+' tahun '+$scope.tahun+' anda sudah di terima, jangan di rubah')
        //                 $scope.uploadIki = false;   
        //             }
            
        //         console.log($scope.uploadIki)
        //     })
        // }else{
            $scope.$applyAsync(()=>{
                $scope.uploadIki = true;
            })
        // }
    }

    $scope.cekAjuan = function(){
        if($scope.allDataIki($scope.id_pegawai,$scope.tahun,$scope.dataTri) != undefined){
        $scope.$applyAsync(()=>{
            if($scope.allDataIki($scope.id_pegawai,$scope.tahun,$scope.dataTri).status == 'terima'){
                alert('Data triwulan ke '+$scope.dataTri+' tahun '+$scope.tahun+' anda sudah di terima, jangan di rubah')
                $scope.uploadIki = false; 
            }    
        })
        }
    }

    //==========================================================================================
    //********************METHOD DI MONITORING*****************
    //==========================================================================================
    $scope.getPegawaiSKPD = function(){ //gak kepakai
        
        $scope.getSatu('tabel_pegawai',$scope.id_skpd,'id_skpd').then((data)=>{
            $scope.allPegawai = data
        })
    }

    

    $scope.getAllLaporan = function(){ //untuk IKI
        $scope.getSatu('tabel_laporan',$scope.id_skpd,'id_skpd').then((data)=>{
            $scope.$applyAsync(()=>{
                $scope.allData = data   
            }) 
        })
    }
    
    $scope.getLaporanSKPD = function(){ //tidak terpakai FIX
        $scope.getSatu('tabel_laporan_skpd',$scope.id_skpd,'id_skpd').then((data)=>{
            $scope.allData = data    
        })
    }


    $scope.$applyAsync(()=>{
        console.log($scope.allPegawai.pegawai)
        
    })
    //method untuk dalam html
    $scope.getLapSKPD = function(data,data2){
            let index = $scope.allData.filter((a)=>{return a.tahun == $scope.tahun && a.jenis_lap === $scope.jenis_lap && (a[data] != null || a[data2] != null)})
            return index[index.length-1];
    }

    //========= versi asli================
    // $scope.getLapSKPD = function(){
    //     let index = $scope.allData.findIndex((a)=>{return a.tahun == $scope.tahun && a.jenis_lap === $scope.jenis_lap})
    //     return $scope.allData[index];
    // }

    //========= versi asli================


    $scope.get3wulan = function(id,bulan){
            let index = $scope.allLaporan.findIndex((a)=>{return a.tahun == $scope.tahun && a.id_peg == id && a.triwulan == bulan})
            if($scope.allLaporan[index] != undefined){
                return $scope.allLaporan[index];
            }
            
    }

    $scope.get3wulanRev = function(id,bulan){
        let index = $scope.allLaporan.findIndex((a)=>{return a.tahun == $scope.tahun && a.id_peg == id && a.triwulan == bulan})
        let fill = $scope.allLaporan.filter((a)=>{return a.tahun == $scope.tahun && a.id_peg == id && a.triwulan == bulan})
        if($scope.allLaporan[index] != undefined){
            // return $scope.allLaporan[index];
            return fill[fill.length-1]
        }
        
    }

    $scope.get3wulanA = function(id,bulan){
            let index = $scope.allData.findIndex((a)=>{return a.tahun == $scope.tahun && a.id_peg == id && a.triwulan == bulan})          
            if($scope.allData[index] != undefined){
                return $scope.allData[index];
            }
    }

    $scope.get3wulanfilter = function(id,bulan){
        let index = $scope.allData.findIndex((a)=>{return a.tahun == $scope.tahun && a.id_peg == id && a.triwulan == bulan})
        let fill = $scope.allData.filter((a)=>{return a.tahun == $scope.tahun && a.id_peg == id && a.triwulan == bulan})          
        if($scope.allData[index] != undefined){
            
            return fill;
            
        }
    }

    
    
    //==========================================================================================
    //********************ADMIN SKPD *****************
    //==========================================================================================

    $scope.resetPassword = function(i){
        // data.password = 123456
        // let num = 'a123456'
        let pass = $scope.md5(123456);
        let a = {'password':pass};
        console.log(pass)
        $scope.update('id_skpd','tabel_skpd',i,{'password':pass}).then(()=>{
            // setTimeout(() => {
            //     $scope.$applyAsync(()=>{
            //         location.reload();
            //     })
            // }, 500);
            
        })
    }

    $scope.editSKPD = function(id){
        $scope.editForm = !$scope.editForm
        let i = $scope.allData.findIndex((a)=>{return a.id_skpd == id})
        $scope.skpd = $scope.allData[i].skpd
        $scope.id = $scope.baseUrl+'login/edit/'+$scope.allData[i].id_skpd
        $scope.generateUser()
        // $scope.addForm();
        console.log($scope.id)
        $scope.editForm = false
        $scope.adding = true
    }

    $scope.hapusSKPD = function(id){
        // $scope.allData = []
        $scope.deleteData('tabel_skpd',id,'id_skpd').then(()=>{
            location.reload();
        })
    }

    $scope.urlBerkas = function(file){
        if(file != null){
            return $sce.trustAsResourceUrl($scope.baseUrl+'../assets/berkas/'+file)
        }
    }

    $scope.urlAction = function(url){
        if(url != null){
            //return $sce.trustAsResourceUrl($scope.baseUrl+url)
            console.log(url)
        }
    }

    $scope.tampilAdmin = function(data){
        // $scope.allData = []
        // $scope.tampilData('tabel_skpd').then((data)=>{
            // console.log(data.data)
            $scope.pagination(data);
            
            
        // })
    }

    $scope.addForm = function(){
        $scope.editPegawai = false 
        $scope.adding = !$scope.adding
        $scope.editForm = true
    }

    

    $scope.generateUser = function(){
        $scope.lefel = "skpd"
        $scope.password = 123456
        let r = Math.floor(Math.random() * (10000 - 50 + 1)) + 50
        $scope.user = 'user.dinas.'+r
        
        let i = $scope.allData.findIndex((a)=>{return a.username.toLowerCase() == $scope.user})
        if(i != -1){
            $scope.user = $scope.user+r
        }
        // console.log($scope.allData)
    }
    //==========================================================================================
    //********************TANGGAPAN FORM*****************
    //==========================================================================================

    $scope.tanggapan = function(){
        $scope.$applyAsync(()=>{
            if($scope.inputan.tanggapan == "" || $scope.inputan.tanggapan == undefined){
                $scope.inputan.tanggapan = "Berkas Rencana Aksi anda di "+$scope.inputan.status;
            }
            let dataLap = {'status':$scope.inputan.status}
            $scope.update('id_lap','tabel_laporan',$scope.inputan.id_lap,dataLap) // = function(field,tabel,id,data){
            .then(()=>{
                delete $scope.inputan.status
                $scope.tambah('tabel_tanggapan',$scope.inputan).then(()=>{
                    let data = {'id_skpd':$scope.id_skpd,
                        'id_peg':$scope.inputan.id_peg,
                        'oleh':$scope.inputan.oleh+' sebagai '+$scope.inputan.jabatan,
                        'id_pengirim':$scope.id_peg,
                        'history':', memberi tanggapan laporan Rencana Aksi, a.n. '+$scope.individu.nama+' di '+dataLap.status
                        }
                        $scope.tambah('tabel_history',data)
                        
                        $scope.iframe = false;
                })
                console.log($scope.inputan)
            })
            
            // console.log($scope.inputan)
        })
    }

    $scope.iframeOpen = function(data,i=null){
        $scope.$applyAsync(()=>{
            $scope.iframe = !$scope.iframe
            // $scope.id_lap = id_lap
            $scope.individu = data
            $scope.tri = i;
        })
    }

    $scope.berkasOpen = function(data=null){
        // $scope.$applyAsync(()=>{
            if(data != null){
                $scope.lapDoc = data
                $scope.iframe = !$scope.iframe
            }else{
                alert('Belum ada dokumen')
            }
            
        // })
    }

    $scope.getTanggapan = function(id){ //gak di pakai
        $scope.getSatu('tabel_tanggapan',id,'id_peg').then((data)=>{
            $scope.dataTanggapan = data
            console.log(data);
        })
    }

    //==========================================================================================
    //********************Untuk HISTORY *****************
    //==========================================================================================

    $scope.getHistory = function(){ //gak di pakai
        let n = 0
        $scope.jumlahData = 0
        $scope.getSatu('tabel_history',$scope.id_skpd,'id_skpd').then((data)=>{
                $scope.dataHistory = data;
                $scope.pagination(data)
            // $scope.$applyAsync(()=>{
                
                $scope.getSatu('tabel_baca',$scope.id_peg,'id_peg').then((datas)=>{
                    
                    console.log(data)
                    if(datas.length != 0){
                        data.forEach((val,key)=>{
                            if(val.id_peg == $scope.id_peg || val.id_pengirim == $scope.id_peg ){
                                n = n+1
                                
                            }
                            if(data.length == key+1){
                                $scope.$applyAsync(()=>{
                                    $scope.jumlahData = n - datas[0].jumlah
                                // })
                                // console.log(datas.jumlah)
                                })
                            }
                        })
                    }
                })
            // })
        })
    }

    $scope.getHist = function(data){
        let arr = []    
            data.sort((a,b)=>{return new Date(b.tgl) - new Date(a.tgl)}).forEach((val,key)=>{
                if(val.id_peg == $scope.id_peg || val.id_pengirim == $scope.id_peg){
                    arr.push(val)
                }
                if(data.length == key+1){
                    $scope.$applyAsync(()=>{
                        // itemsPerPage = 1
                        $scope.allData = arr;
                        $scope.customPagination(arr)
                    })
                }
            })
    }
    $scope.jam = function(angka){
        return Math.trunc(angka/60)
    }

    $scope.telahBaca = function(id){ //gak di pakai
        $scope.getSatu('tabel_history',$scope.id_skpd,'id_skpd').then((data)=>{
            // $scope.dataHistory = data;
                $scope.getSatu('tabel_baca',id,'id_peg').then((datas)=>{
                    $scope.jumlahData = 0
                    console.log(datas)
                    if(datas.length == 0){
                        $scope.$applyAsync(()=>{
                            $http.post($scope.baseUrl+"Api/post/tabel_baca/",{'id_peg':id,'jumlah':data.length}).then(()=>{
                                console.log(' baca tambah')
                            })
                        })
                    }else{
                        $scope.$applyAsync(()=>{
                            $http.post($scope.baseUrl+"Api/put/id_peg/"+id+"/tabel_baca/",{'jumlah':data.length}).then(()=>{
                                console.log(' baca update')
                            })
                        })
                    }
                })
        })
    }

    

    $scope.diffTime = function(dt1){
        var diff =(new Date().getTime() - new Date(dt1).getTime()) / 1000;
        diff /= 60;
        return Math.abs(Math.round(diff));
    }

    //==========================================================================================
    //********************kumpulan method dengan PROMISE *****************
    //==========================================================================================
    // ambil data semua
    $scope.tampilData = function(tabel){
        return $q((resolve,reject)=>{
            $http.get($scope.baseUrl+'Api/get/'+tabel).then((data)=>{
                 resolve(data);
            },(err)=>{
                reject(err);
            });
        })
     }

    // $scope.uurl = encodeURI($scope.baseUrl+'Api/getAlternatif/');
    // ambil data satu
    $scope.getSatu = function(tabel,id,field){
        return $q((resolve,reject)=>{
            $http.get($scope.baseUrl+'Api/getAlternatif/'+tabel+"/"+id+"/"+field)
            .then((data)=>{
                resolve(data.data);
            },(err)=>{
                reject(err);
            });
        })
    }

    $scope.getAlt2 = function(tabel,field,id,field2,nilai){
        return $q((resolve,reject)=>{
            $http.get($scope.baseUrl+'Api/getAlt2/'+tabel+"/"+field+"/"+id+"/"+field2+"/"+nilai)
            .then((data)=>{
                resolve(data.data);
            },(err)=>{
                reject(err);
            });
        })
    }

    $scope.getSatuDua = function(tabel,id,field,field2,nilai,field3,nilai2){ //yang makai baru laporan
        return $q((resolve,reject)=>{
            $http.get($scope.baseUrl+'Api/getAlternatif/'+tabel+"/"+id+"/"+field+"/"+field2+"/"+nilai+"/"+field3+"/"+nilai2)
            .then((data)=>{
                    resolve(data.data);
            },(err)=>{
                    reject(err);
            });
        })
    }
    
    // tambah data
    $scope.tambah = function(tabel,data){
        return $q((resolve,reject)=>{
            $http.post($scope.baseUrl+"Api/post/"+tabel,data) //untuk badan web
            // $http({ //untuk luar badan web
            //     headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            //     url: $scope.baseUrl+"Api/post/"+tabel,
            //     method: "POST",
            //     data    : data
            // })
            .then((dat)=>{
                $scope.notify('Data sukses tersimpan')
                resolve(dat)
            },(error)=>{
                $scope.notify('Gagal!, ada email atau nip yang sudah terdaftar')
                reject(error);
            })
        })
    }

    //join  2 tabel
    $scope.joinTable = function(tabel1,tabel2,field1,field2,id){
        return $q((resolve,reject)=>{
        $http.get($scope.baseUrl+'Api/join/'+tabel1+"/"+tabel2+"/"+field1+"/"+field2+"/"+id)
            .then((data)=>{
                resolve(data)
            },(err)=>{
                reject(err);
            })
        })
    }

       // hapus data
    $scope.deleteData = function(tabel,id,field){
        return $q((resolve,reject)=>{
            $http.delete($scope.baseUrl + 'Api/del/' + field + "/" + id + "/" + tabel).
                then((data)=>{
                    $scope.notify('Data sudah dihapus')
                    resolve(data)
                },(err)=>{
                    reject(err)
                });
        });
    }


    $scope.update = function(field,tabel,id,data){
        // $scope.datas[$scope.index] = $scope.inputnama;
        // $http.put($scope.baseUrl+"Api/put/"+ field + "/" + $scope.id + "/" +tabel,$scope.inputnama) //untuk badan web
        // let next 
        // if(field2 != null){
        //     next = "/"+field2+"/"+id2
        // }else{
        //     next = '';
        // }
        return $q((resolve,reject)=>{
            $http({ // untuk luar web
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                url: $scope.baseUrl+"Api/put/"+ field + "/" +id+ "/" +tabel,
                method: "POST",
                data    : data
            })
            .then((dat)=>{
                $scope.notify('Data sudah dirubah')
                resolve(dat)
            },(err)=>{
                reject(err)
            })
        })
    }
   //******************** batas promise*/
   
   
   //==========================================================================================
    // ****************** MD5
    //==========================================================================================
    $scope.md5 = function(val){
        let hash =  btoa(val+'user')//btoa(val);
        console.log(hash)
        return hash;
    }

//==================================
    // baca excel
//====================================
        $scope.read = function (workbook) {
            // arrSKPD = []
            $scope.dialogBox = true;
            var headerNames = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]], { header: 1 })[0];
            var data = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]]);
            // let user;
            // for (var row in data)
            // {
                // let r = Math.random().toString(36).substring(7);
                // user = 'user_'+data[row].skpd.split(' ')[0].substr(0,3)+data[row].skpd.split(' ')[1]
            //     $scope.$apply(function() {
            //         arrSKPD.push(Object.assign(data[row],{'level':'skpd','username':user.toLowerCase(),'password':r.toUpperCase(),'level_lap':''}))
            //         $scope.dataPeg.push(Object.assign(data[row],{'level':'skpd','username':user.toLowerCase(),'password':r.toUpperCase(),'level_lap':''}))
            //     });
            
            $scope.dataExcel = data
            console.log(data);
            // tampil data jabatan
            $scope.getDuaJabatan();
            
            // }

            setTimeout(()=>{
                $scope.$apply(()=>{
                    $scope.dialogBox = true
                })
            },0)
            

        }

        $scope.excels = function (workbook) {
            $scope.dialogBox = true;
            $scope.dataSkpd = []
            arrSKPD = []
            var headerNames = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]], { header: 1 })[0];
            var data = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]]);
            let user;
            for (var row in data)
            {
                let r = Math.random().toString(36).substring(7);
                let u = Math.floor(Math.random() * (10000 - 50 + 1)) + 50
                user = 'user.dinas.'+u//'user_'+data[row].skpd.split(' ')[0].substr(0,3)+data[row].skpd.split(' ')[1]
                $scope.$apply(function() {
                    arrSKPD.push(Object.assign(data[row],{'level':'skpd','username':user.toLowerCase(),'password':123456}))
                    $scope.dataSkpd.push(Object.assign(data[row],{'level':'skpd','username':user.toLowerCase(),'password':123456}))
                });
               
               
            }
            $scope.$apply(function(){
                $scope.notify('Import Sukses !');
            })
            
            console.log($scope.dataSkpd)

        }


        //******************************************** */
        //adopsi dari perdana
        //******************************************** */
        $scope.hapus = function(i){
            $scope.dataSkpd.splice(i,1);
            $scope.notify('Data dihapus!');
        }

        $scope.simpan = function(){
            $scope.cek = false
            arrSKPD.forEach((val,key)=>{
                
                if(val.username == "" || val.password == ""){ 
                    // console.log(val.username)
                    $scope.cek = true
                }
            });
            if(!$scope.cek){
                arrSKPD.forEach((val,key)=>{
                    val.password = $scope.md5(val.password)
                    $scope.tambahx('tabel_skpd',val)
                    // console.log(val)
                });
            }else{
                $scope.notify("username dan password tidak boleh kosong");
                // console.log(arrSKPD)
            }
            // console.log($scope.cek)
        }

        // $scope.cekUser = function(data,i){
            
        //     $scope.dataSkpd[i].username = data.replace(/\s/g, '');
        //     arrSKPD.forEach((val,key)=>{
        //         if(key != i){
        //             if(val.username.toLowerCase() == data.toLowerCase()){
        //                 $scope.notify("username tidak boleh sama")
        //                 $scope.dataSkpd[i].username = '';
        //                 // $scope.arrSKPD[i].username = '';
        //             }
        //         }
                
        //     })
        // }

        // $scope.rubah = function(field,data, i,admin = null){
        //     // console.log(arrSKPD[i][field])
        //     // $scope.$apply(function(){
        //         // $scope.cek = false
        //         if(admin != 'admin'){
            
        //             // if($scope.data[field] != "undefined"){
        //                 arrSKPD[i][field] = data;//$scope.level;
        //             // }
        //         }else{
        //             arrSKPD.forEach((val,key)=>{
        //                 if(key != i){
        //                     arrSKPD[key][field] = ''
        //                 }
        //             })
        //         }
        //     // })
        // }

        // console.log($scope.baseUrl)

        $scope.tambahx = function(tabel,inputan){
                $http.post($scope.baseUrl+"Api/post/"+tabel,inputan) //untuk badan web
                // $http({ //untuk luar badan web
                //     headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                //     url: $scope.baseUrl+"Api/post/"+tabel,
                //     method: "POST",
                //     data    : inputan
                // })
                .then((data)=>{
                    $scope.notify('Data sukses tersimpan !')
                    // console.log(data);
                    // $scope.tampilData(tabel);
                    setTimeout(() => {
                        $scope.$apply(function(){
                            location.reload();
                        })
                        
                    }, 1000);
                },(error)=>{
                    // alert("ada kesalahan");
                    console.log(error); 
                })
            }

//******************************************** */
//adopsi dari perdana BATAS
//******************************************** */


        $scope.error = function (e) {
            console.log(e);
        }


    //==========================================================================================
    // ****************** NOTIF config
    //==========================================================================================
        $scope.batal = function(){
            $scope.delBox = !$scope.delBox
        }

       

        $scope.yes = function(){
            $scope.deleteData($scope.delTabel,$scope.delId,$scope.delField).then(()=>{
                $scope.batal()
                $scope.tampilPegawai()
            })
        }
        
        $scope.dialog = function(){
            $scope.dialogBox = !$scope.dialogBox 
        }

        $scope.notify = function(pesan=null){
            $scope.notif = true;
            $scope.pesan = pesan
            setTimeout(()=>{
                $scope.$apply(()=>{
                    $scope.notif = false
                    
                })
            },2000)
        }

        $scope.alert = function(pesan){
            alert(pesan);
        };
    //==========================================================================================
    // ****************** CEK TRIWULAN
    //==========================================================================================
    
    $scope.cekTriwulan = function(bulan=null){
        // $scope.bulan = new Date().getMonth();

    //    $scope.tahun = new Date().getFullYear();
        
        if(parseInt($scope.bulan) < 3){
            $scope.triwulan = "1"
        }else if(parseInt($scope.bulan) < 6 && parseInt($scope.bulan) > 2){
            $scope.triwulan = "2"
        }else if(parseInt($scope.bulan) < 9 && parseInt($scope.bulan) > 5){
            $scope.triwulan = "3"
        }else{
            $scope.triwulan = "4"
        }

        if($scope.tahunNow == $scope.tahun){
            if(parseInt(bulan) > parseInt($scope.triwulan)){
                // $scope.notify('cocok '+$scope.triwulan)
                //eksekusi lanjut
            // }else{
                if(bulan != null){
                    $scope.dataTri = $scope.triwulan
                    $scope.notify('Maaf triwulan ini belum saatnya')
                }
            }
        }else if($scope.tahunNow > $scope.tahun){
            // $scope.notify('Load data '+$scope.tahun)
        }else{
            
            $scope.notify('Maaf tahun '+$scope.tahun+'  belum saatnya')
            $scope.tahun = $scope.tahunNow
            $scope.dataTri = $scope.triwulan
        }

        // console.log("tri "+$scope.triwulan)
        // console.log("data "+bulan)
        // console.log("bulan "+$scope.bulan)
        // location.reload();
    }
    $scope.cekTriwulan();
    //==========================================================================================
    // ****************** PAGINATION
    //==========================================================================================
    console.log('okoko')

    $scope.grafik = function(id){
        let laju = 0
        let telat = 0
        let users = []
        $scope.laju = 0
        $scope.telat  = 0
        $scope.getAlt2('tabel_laporan','id_skpd',id,'triwulan',$scope.dataTri).then((data)=>{
            data.forEach((val,i)=>{
                if(users.indexOf(val.id_peg) == -1){
                        users.push(val.id_peg);
                        let hari = new Date(val.tgl).getDate();
                        let bln = new Date(val.tgl).getMonth()
                        if(val.triwulan == 1 && $scope.tahun == val.tahun){
                            if(bln < 2 || hari < 15 && bln == 2){
                                laju++
                                // console.log('1 laju')
                            }else{
                                telat++
                                // console.log('1 telat') 
                            }
                        }
                        if(val.triwulan == 2 && $scope.tahun == val.tahun){
                            if(bln < 5 || hari < 15 && bln == 5){
                                laju++
                                // console.log('2 laju')
                            }else{
                                telat++
                                // console.log('2 telat') 
                            }   
                        }
                        if(val.triwulan == 3 && $scope.tahun == val.tahun){
                            if(bln < 8 || hari < 15 && bln == 8){
                                laju++
                                // console.log('3 laju')
                            }else{
                                telat++
                                // console.log('3 telat') 
                            }
                        }
                        if(val.triwulan == 4 && $scope.tahun == val.tahun){
                            if(bln < 11 || hari < 15 && bln == 11){
                                laju++
                                // console.log('laju '+laju)
                            }else{
                                telat++
                            //    console.log('4 telat') 
                            }
                        }
                }
                if(data.length == i+1){
                    // console.log(telat)
                    // console.log(laju)
                    // $scope.telat = telat;
                    // $scope.laju = laju;
                    $scope.laju = (laju / $scope.totPegGraf *100).toFixed(2)+'%' 
                    $scope.telat = (telat / $scope.totPegGraf *100).toFixed(2)+'%'
                    // console.log(rumusL)
                    // console.log(rumusT)
                }
                
            })
        })
    }

    $scope.customPagination = function(data){
        $scope.totPegGraf = data.length
        $scope.jumlahPage = []
        $scope.offsetItems = 0;
        $scope.currentPage = 0;
            
                for(let i = 0 ; Math.ceil(data.length/ $scope.itemsPerPage) > i; i++){
                    $scope.jumlahPage.push(i);
                }
            
    }

    $scope.focusCari = function(){
        $scope.offsetItems = 0;
        $scope.currentPage = 0;
    }

    $scope.goto = function(x){
        $scope.currentPage = x;
        $scope.offsetItems = x*$scope.itemsPerPage
        // console.log($scope.itemsPerPage+' dan off '+$scope.offsetItems)
    }

//     $scope.$watch(()=>{
//       $scope.itemsPerPage = 6
//     })
//    console.log("asdasdsa")
    
    $scope.pagination = function(data){
        $scope.totalItems = data.length;
        $scope.currentPage = 1;
        $scope.itemsPerPage = 6;

        $scope.$watch("currentPage", function() {
            setPagingData($scope.currentPage);
        });

        function setPagingData(page) {
            var pagedData = data.slice(
            (page - 1) * $scope.itemsPerPage,
            page * $scope.itemsPerPage
            );
            $scope.allData = pagedData;
        }
    }

    $scope.cancel = function(){
        $scope.$applyAsync(()=>{
            $scope.inputan.tanggapan = ''
            $scope.inputan.status = 'terima'
        })
    }
        //=============SAMPAH============

         // $scope.filteredTodos = []
    // ,$scope.currentPage = 1
    // ,$scope.numPerPage = 10
    // ,$scope.maxSize = 5;

    // $scope.$applyAsync('currentPage + numPerPage', function() {
    //     var begin = (($scope.currentPage - 1) * $scope.numPerPage)
    //     , end = begin + $scope.numPerPage;
        
    //     $scope.filteredTodos = $scope.todos.slice(begin, end);
    //   });]]

    // $scope.getDataPegawai = function(){
    //     $scope.getSatu('tabel_pegawai',$scope.id_peg,'id_peg').then((data)=>{
    //         $scope.userLogin = data
    //     })
    // }

    // $scope.$applyAsync(()=>{
    //     $scope.getDataPegawai();
    // })

    $scope.test =function(data){
        console.log(data);
    }

    $scope.$applyAsync(()=>{
        console.log('excel baruuuu')
    
            
        // $scope.getHistory();
        // console.log($scope.allPegawai);
    })

    // $scope.$apply(()=>{
    //     $scope.getHistory();
    // })
    
});
// app.controller("sakipKab", function ($scope,$http,$q){
//     $scope.bolArea2 = function(){
//         $scope.textareaBox = !$scope.textareaBox; 
//         console.log('masuk pak')
//     }
// })
