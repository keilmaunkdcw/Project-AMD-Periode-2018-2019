package com.example.poliklinik.Api;

import com.example.poliklinik.Model.DaftarResponse;
import com.example.poliklinik.Model.LoginResponse;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface InterfaceDaftar {
    @FormUrlEncoded
    @POST("daftar.php")
    Call<DaftarResponse> daftarRequest(@Field("nama") String str, @Field("username") String str2, @Field("password") String str3);
}
