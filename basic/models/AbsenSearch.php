<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Absen;
use app\models\Siswa;

/**
 * AbsenSearch represents the model behind the search form of `app\models\Absen`.
 */
class AbsenSearch extends Absen
{
    /**
     * @inheritdoc
     */
     public $tgl_a;
    public $tgl_b;
    public $nama;
    public $kelas;
    public function rules()
    {
        return [
            [['id', 'id_siswa', 'status'], 'integer'],
            [['tanggal', 'add_date', 'foto'], 'safe'],
            [['tgl_a','tgl_b','nama','kelas'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Absen::find()->innerJoinWith('siswa', true);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'id_siswa',
                'tanggal',
                'status',
                'add_date',
                'nama' => [
                    'asc' => ['siswa.nama' => SORT_ASC],
                    'desc' => ['siswa.nama' => SORT_DESC],
                    'label' => 'Nama Siswa'
                ],
                'kelas' => [
                    'asc' => ['siswa.kelas' => SORT_ASC],
                    'desc' => ['siswa.kelas' => SORT_DESC],
                    'label' => 'Kelas Siswa'
                ]
            ]
        ]);       
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'absen.id' => $this->id,
            'absen.id_siswa' => $this->id_siswa,
            'absen.tanggal' => $this->tanggal,
            'absen.add_date' => $this->add_date,
            'absen.status' => $this->status,

        ]);

        $query->andFilterWhere(['like', 'absen.foto', $this->foto])
         ->andFilterWhere(['like', 'siswa.nama', $this->nama])
         ->andFilterWhere(['like', 'siswa.kelas', $this->kelas])
        ->andFilterWhere(['>=', 'absen.tanggal', $this->tgl_a])
            ->andFilterWhere(['<=', 'absen.tanggal', $this->tgl_b]);;

        return $dataProvider;
    }
}
