package com.example.poliklinik.Api;

import com.example.poliklinik.Model.DaftarPasienResponse;
import com.example.poliklinik.Model.DataDokterResponse;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface InterfaceDaftarPasien {
    @FormUrlEncoded
    @POST("daftarpasien.php")
    Call<DaftarPasienResponse> daftarPasien(@Field("no_konfirmasi") String str, @Field("nama") String str1, @Field("jenis_kelamin") String str2, @Field("golongan_darah") String str3, @Field("alamat") String alamat, @Field("umur") String str4, @Field("riwayat_penyakit") String str5, @Field("nohp") String str6, @Field("id_dokter") String str7, @Field("user_create") String str8);
}
