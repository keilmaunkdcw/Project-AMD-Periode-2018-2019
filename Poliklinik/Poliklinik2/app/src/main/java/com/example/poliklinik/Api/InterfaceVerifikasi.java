package com.example.poliklinik.Api;

import com.example.poliklinik.Model.DaftarPasienResponse;
import com.example.poliklinik.Model.VerifikasiResponse;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface InterfaceVerifikasi {
    @FormUrlEncoded
    @POST("konfirmasi.php")
    Call<VerifikasiResponse> verifikasiPasien(@Field("no_konfirmasi") String str, @Field("username") String str1, @Field("id_dokter") String str2);
}
