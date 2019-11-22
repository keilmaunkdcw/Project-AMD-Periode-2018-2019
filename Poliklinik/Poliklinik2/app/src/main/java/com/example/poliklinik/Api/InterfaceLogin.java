package com.example.poliklinik.Api;

import com.example.poliklinik.Model.LoginResponse;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface InterfaceLogin {
    @FormUrlEncoded
    @POST("login.php")
    Call<LoginResponse> loginRequest(@Field("username") String str, @Field("password") String str2);
}
