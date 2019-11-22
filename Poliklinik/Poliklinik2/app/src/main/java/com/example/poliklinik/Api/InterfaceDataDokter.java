package com.example.poliklinik.Api;

import com.example.poliklinik.Model.DaftarDokterResponse;
import com.example.poliklinik.Model.DataDokterResponse;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface InterfaceDataDokter {
    @FormUrlEncoded
    @POST("listdokter.php")
    Call<DataDokterResponse> listDataDokter(@Field("spesialis") String str, @Field("user") String str2);
}
