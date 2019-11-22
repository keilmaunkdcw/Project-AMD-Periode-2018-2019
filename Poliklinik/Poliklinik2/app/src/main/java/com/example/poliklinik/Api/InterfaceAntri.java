package com.example.poliklinik.Api;

import com.example.poliklinik.Model.AntriResponse;
import com.example.poliklinik.Model.VerifikasiResponse;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface InterfaceAntri {
    @FormUrlEncoded
    @POST("antri.php")
    Call<AntriResponse> noAntri(@Field("username") String str);
}
