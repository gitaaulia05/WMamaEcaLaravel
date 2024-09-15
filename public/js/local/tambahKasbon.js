
var inputHarga = document.getElementById('total_bayar');

var sisaBayar = document.getElementById('sisa_bayar');

var pesanError = document.getElementById('total_bayar_error');

var isLunas = document.getElementById('is_lunas');

var ResultLunas = document.getElementById('final_is');

const button = document.getElementById('simpan');
const FloatSisaBayar = parseFloat(sisaBayar.value) ;

   inputHarga.addEventListener('input' , function (){
    const totalBayar = parseFloat(this.value) || 0;

    if(totalBayar > FloatSisaBayar){
        pesanError.textContent = 'Total Bayar yang Anda Masukkan Melebihi Sisa Bayar!';
        pesanError.style.display = 'block';
        button.disabled = true; 

       } else {
        pesanError.style.display = 'none';
        button.disabled = false; 

        const newSisaBayar = Math.max(FloatSisaBayar - totalBayar, 0);
       sisaBayar.setAttribute('value' , newSisaBayar.toFixed(2));

        if (newSisaBayar === 0) {
          isLunas.value = "1";  
          ResultLunas.setAttribute('value' , 1);  
      } else {
          isLunas.value = "0";  
          ResultLunas.setAttribute('value' , 0); 
      }
 
       }


    
   });

