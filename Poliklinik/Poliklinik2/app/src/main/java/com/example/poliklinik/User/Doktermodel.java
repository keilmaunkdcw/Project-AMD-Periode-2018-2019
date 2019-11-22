package com.example.poliklinik.User;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.poliklinik.Model.DokterListItem;
import com.example.poliklinik.R;

import java.util.List;

public class Doktermodel extends RecyclerView.Adapter<Doktermodel.DataViewAdapter> {
   private Context context;
   private List<DokterListItem> listDokter;

    public Doktermodel(Context context, List<DokterListItem> listDokter){
        this.context = context;
        this.listDokter = listDokter;
    }


    @NonNull
    @Override
    public Doktermodel.DataViewAdapter onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        LayoutInflater layoutInflater = LayoutInflater.from(viewGroup.getContext());
        View view = layoutInflater.inflate(R.layout.doktermodel,viewGroup,false);
        return new DataViewAdapter(view);
    }

    @Override
    public void onBindViewHolder(@NonNull Doktermodel.DataViewAdapter dataViewAdapter, final int i) {
        final DokterListItem dokterListItem = listDokter.get(i);
        dataViewAdapter.tv_nama.setText(dokterListItem.getNama_lengkap());
        dataViewAdapter.tv_iddokter.setText(dokterListItem.getId().toString());
        dataViewAdapter.iv_foto.setImageResource(R.drawable.ic_account_circle_black_24dp);
        dataViewAdapter.tv_spesialis.setText(null);
        dataViewAdapter.cv_dokter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context,Input_Pasien.class);
                intent.putExtra("id_dokter",dokterListItem.getId().toString());
                context.startActivity(intent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return listDokter.size();
    }

    public class DataViewAdapter extends RecyclerView.ViewHolder{
        private ImageView iv_foto;
        private TextView tv_nama;
        private TextView tv_iddokter;
        private TextView tv_spesialis;
        private CardView cv_dokter;

       public DataViewAdapter(@NonNull View itemView){
            super(itemView);

            cv_dokter = (CardView) itemView.findViewById(R.id.cv_dokter);
            iv_foto = (ImageView) itemView.findViewById(R.id.iv_foto);
            tv_nama = (TextView) itemView.findViewById(R.id.tv_namadokter);
            tv_iddokter = (TextView) itemView.findViewById(R.id.tv_iddokter);
            tv_spesialis = (TextView) itemView.findViewById(R.id.tv_spesialis);


        }
    }
}
