# Misc hoardingHouse 100

問題設定がめちゃくちゃですが, grepの強さを再認識してほしくて作りました。grep強すぎる......

[解法1]
flagなら ctf が含まれていると予想
-> $ grep -r ctf ./

[解法2]
zipファイルに対してもgrep可能
-> $ strings hoardingHouse. zip | grep ctf

![hoardingHouse](https://pbs.twimg.com/media/ELCQDCKUcAAwO6o?format=jpg&name=4096x4096)