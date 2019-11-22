package com.example.poliklinik.Admin;

import android.content.Context;
import android.content.DialogInterface;
import android.support.annotation.NonNull;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.poliklinik.Api.Client;
import com.example.poliklinik.Api.InterfaceDataAntrian;
import com.example.poliklinik.Api.InterfaceVerifikasi;
import com.example.poliklinik.Model.AntrianListItem;
import com.example.poliklinik.Model.PasienListItem;
import com.example.poliklinik.Model.VerifikasiResponse;
import com.example.poliklinik.R;
import com.example.poliklinik.Sessionlogin;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class AntrianModel extends RecyclerView.Adapter<AntrianModel.DataViewAdapter> {
   private Context context;
   private List<AntrianListItem> listAntri;

    public AntrianModel(Context context, List<AntrianListItem> listAntri){
        this.context = context;
        this.listAntri = listAntri;
    }


    @NonNull
    @Override
    public AntrianModel.DataViewAdapter onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        LayoutInflater layoutInflater = LayoutInflater.from(viewGroup.getContext());
        View view = layoutInflater.inflate(R.layout.antrianmodel,viewGroup,false);
        return new DataViewAdapter(view);
    }

    @Override
    public void onBindViewHolder(@NonNull final AntrianModel.DataViewAdapter dataViewAdapter, final int i) {
        final AntrianListItem antrianListItem = listAntri.get(i);
        dataViewAdapter.tv_nokonfirmasi.setText(antrianListItem.getNo_konfirmasi());
        dataViewAdapter.tv_nama.setText(antrianListItem.getNama());
        dataViewAdapter.tv_jeniskelamin.setText(antrianListItem.getJenis_kelamin());
        dataViewAdapter.tv_namadokter.setText(antrianListItem.getNama_dokter());
        dataViewAdapter.tv_noantri.setText(antrianListItem.getNo_antri());
        dataViewAdapter.cv_dokter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(context);
                alertDialogBuilder.setTitle("Message");
                alertDialogBuilder.setMessage("Anda Yakin Ingin Konfirmasi "+antrianListItem.getNo_konfirmasi()+" ?")
                        .setCancelable(false)
                        .setNegativeButton("Batal", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {

                            }
                        })
                        .setPositiveButton("Hapus Antrian", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {

                            }
                        });
                AlertDialog alertDialog = alertDialogBuilder.create();
                alertDialog.show();

            }
        });
    }

    @Override
    public int getItemCount() {
        return listAntri.size();
    }

    public class DataViewAdapter extends RecyclerView.ViewHolder{
        private CardView cv_dokter;
        private TextView tv_nokonfirmasi,tv_nama,tv_jeniskelamin,tv_namadokter,tv_noantri;

       public DataViewAdapter(@NonNull View itemView){
            super(itemView);

            cv_dokter = (CardView) itemView.findViewById(R.id.cv_dokter);
            tv_nokonfirmasi = (TextView) itemView.findViewById(R.id.tv_nokonfirmasi);
            tv_nama = (TextView) itemView.findViewById(R.id.tv_namapasien);
            tv_jeniskelamin = (TextView) itemView.findViewById(R.id.tv_jeniskelamin);
            tv_namadokter = (TextView) itemView.findViewById(R.id.tv_namadokter);
            tv_noantri = (TextView) itemView.findViewById(R.id.tv_noantri);
        }
    }
}
