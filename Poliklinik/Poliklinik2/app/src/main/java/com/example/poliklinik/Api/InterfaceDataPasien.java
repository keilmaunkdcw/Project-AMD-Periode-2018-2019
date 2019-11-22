package com.example.poliklinik.Api;

import com.example.poliklinik.Model.DataDokterResponse;
import com.example.poliklinik.Model.DataPasienResponse;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface InterfaceDataPasien {
    @GET("listpasien.php")
    Call<DataPasienResponse> showAllPasien();
}
