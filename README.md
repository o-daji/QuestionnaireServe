# QuestionnaireServe
アンケート結果格納アプリ
■概要  
 エクセルや紙媒体で取得したアンケートに対し、結果を格納・照会できるようにするアプリ  

■主な機能  
 ・ログイン  
 ・アンケート結果一覧表示
 ・アンケート結果の登録・照会・削除
 ・(未実装)アンケート結果の編集
 ・(未実装)アンケート結果検索(あいまい検索含む)
 ・(未実装)ユーザ登録
 ・(未実装)項目のバリデーション

■現状の課題
・実装優先でクラス設計をしっかりしなかったため、ControllerやModelの記載に
  無駄があったり、MVCとして適切かどうか怪しい。
・実装途中で、Controller作成においてCRUDで便利な「–resource」の存在を知った。
  折角Laraveに便利な機能があったのに活かせていない。
・bladeについて、テンプレートが全く活用できていない。
  親テンプレートや子テンプレートについて、どういった観点で共通化すればよいかなど、切り出し方がうまくつかめていない。
  基礎から復習の必要があり。
・ログイン管理のテーブルをデフォルトのUserテーブルに変える必要がある。
  別でMySQL上に作成したテーブルを使っており、今のままだとマイグレーションして即アプリを実行することができない。
・BootStrapやHTMLによるレイアウト指定について、上手く記載できていない。
  狙った通りの配置が出来るように、marginやpadding、Grid Systemについてもっと理解が必要。
・JavaScript (jQuery)の利用方法について、CDNとmixどっちも使ってたりして統一されていない。
  個人的にはネットワーク接続不可の観点からmixだけで処理を実現できるようにしたい。


>>>>>>> origin/main
