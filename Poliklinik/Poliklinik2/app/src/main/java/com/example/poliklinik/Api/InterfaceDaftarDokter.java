package com.example.poliklinik.Api;

import com.example.poliklinik.Model.DaftarDokterResponse;
import com.example.poliklinik.Model.LoginResponse;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface InterfaceDaftarDokter {
    @FormUrlEncoded
    @POST("daftardokter.php")
    Call<DaftarDokterResponse> daftarDokter(@Field("id") String str, @Field("nama") String str2, @Field("email") String str3, @Field("nohp") String str4, @Field("spesialis") String str5);
}
