# 商品管理システム

## 概要

商品管理を管理者と一般ユーザーとで操作できる内容を分け、管理を行う事を目的として作成。
一般ユーザーは商品一覧と種別一覧のみ閲覧可能であり、管理者のみ商品と種別の登録・編集・削除が可能。
アカウント登録は誰でも行えるが、デフォルトでは一般ユーザーでの登録になり
誤操作や不正により登録・編集・削除を行うことが出来ない仕様になっている。
また、商品一覧画面には検索ボックスを用意しており、商品が増えた際に目的の商品を探しやすくしている。

## 主な機能

- ログイン・ログアウト機能
- 商品一覧画面
- 商品新規登録・編集・削除機能
- 商品検索機能
- 種別一覧画面
- 種別新規登録・編集・削除機能

## 開発環境
```
PHP 8.2.7  
MySQL 8.0.33 for macos13.3  
Laravel 8.83.27
```

## 設計書

[設計書ページへ](https://drive.google.com/drive/folders/1ooxWwjycCyfDTwZoAly7Mt1IjIcyr2CE?usp=drive_link)

## システム閲覧

[アプリケーションページへ](https://techis-jishuseisaku-mutou-dd1b81179fe4.herokuapp.com/)

### テストアカウント情報
```
管理者アカウント  
メールアドレス : new1@example.com  
パスワード : 12345678

テストアカウント  
メールアドレス : sumple1@example.com  
パスワード : 87654321
```
