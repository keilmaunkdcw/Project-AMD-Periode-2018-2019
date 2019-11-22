package com.example.poliklinik.Api;

import com.example.poliklinik.Model.DataAntrianResponse;
import com.example.poliklinik.Model.DataPasienResponse;

import retrofit2.Call;
import retrofit2.http.GET;

public interface InterfaceDataAntrian {
    @GET("listantri.php")
    Call<DataAntrianResponse> showAllAntrian();
}
