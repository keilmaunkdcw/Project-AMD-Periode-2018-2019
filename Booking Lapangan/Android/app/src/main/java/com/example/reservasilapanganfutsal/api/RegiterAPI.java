package com.example.reservasilapanganfutsal.api;

import com.example.reservasilapanganfutsal.Model.Value;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface RegiterAPI {
    @FormUrlEncoded
    @POST("api-insert.php")
    Call<Value> booking(@Field("nama")String nama,
                     @Field("nik")String nik,
                     @Field("notelp")String notelp,
                     @Field("alamat")String alamat,
                     @Field("lapangan")String lapangan,
                     @Field("tgl_sewa")String tgl_sewa,
                     @Field("jammulai")String jammulai,
                     @Field("lamajamsewa")String lamajamsewa);
    @FormUrlEncoded
    @POST("search.php")
    Call<Value> search(@Field("search") String search);
    
    @GET("api-view.php")
    Call<Value> view();

    @GET("json.php")
    Call<Value> lapangan();



}
