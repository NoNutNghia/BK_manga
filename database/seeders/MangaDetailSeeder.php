<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MangaDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manga_detail')->insert(array(
            array(
                'manga_id' => 1,
                'title' => 'One Piece',
                'manga_status' => 2,
                'author_id' => 4,
                'other_name' => 'Vua Hải Tặc',
                'age_range' => 1,
                'description' => 'One Piece là câu truyện kể về Luffy và các thuyền viên của mình. Khi còn nhỏ, Luffy ước mơ trở thành Vua Hải Tặc. Cuộc sống của cậu bé thay đổi khi cậu vô tình có được sức mạnh có thể co dãn như cao su, nhưng đổi lại, cậu không bao giờ có thể bơi được nữa. Giờ đây, Luffy cùng những người bạn hải tặc của mình ra khơi tìm kiếm kho báu One Piece, kho báu vĩ đại nhất trên thế giới. Trong One Piece, mỗi nhân vật trong đều mang một nét cá tính đặc sắc kết hợp cùng các tình huống kịch tính, lối dẫn truyện hấp dẫn chứa đầy các bước ngoặt bất ngờ và cũng vô cùng hài hước đã biến One Piece trở thành một trong những bộ truyện nổi tiếng nhất không thể bỏ qua. Hãy đọc One Piece để hòa mình vào một thế giới của những hải tặc rộng lớn, đầy màu sắc, sống động và thú vị, cùng đắm chìm với những nhân vật yêu tự do, trên hành trình đi tìm ước mơ của mình.',
            ),
            array(
                'manga_id' => 2,
                'title' => 'Học Viện Anh Hùng',
                'manga_status' => 2,
                'author_id' => 12,
                'other_name' => 'Boku No Hero Academia',
                'age_range' => 2,
                'description' => 'Vào tương lai, lúc mà con người với những sức mạnh siêu nhiên là điều thường thấy quanh thế giới. Đây là câu chuyện về Izuku Midoriya, từ một kẻ bất tài trở thành một siêu anh hùng. Tất cả ta cần là mơ ước.',
            ),
            array(
                'manga_id' => 3,
                'title' => 'Onepunch Man',
                'manga_status' => 2,
                'author_id' => 14,
                'other_name' => 'Đấm Phát Chết Luôn',
                'age_range' => 2,
                'description' => 'Onepunch-Man là một Manga thể loại siêu anh hùng với đặc trưng phồng tôm đấm phát chết luôn… Lol!!! Nhân vật chính trong Onepunch-man là Saitama, một con người mà nhìn đâu cũng thấy “tầm thường”, từ khuôn mặt vô hồn, cái đầu trọc lóc, cho tới thể hình long tong. Tuy nhiên, con người nhìn thì tầm thường này lại chuyên giải quyết những vấn đề hết sức bất thường. Anh thực chất chính là một siêu anh hùng luôn tìm kiếm cho mình một đối thủ mạnh. Vấn đề là, cứ mỗi lần bắt gặp một đối thủ tiềm năng, thì đối thủ nào cũng như đối thủ nào, chỉ ăn một đấm của anh là… chết luôn. Liệu rằng Onepunch-Man Saitaman có thể tìm được cho mình một kẻ ác dữ dằn đủ sức đấu với anh? Hãy theo bước Saitama trên con đường một đấm tìm đối cực kỳ hài hước của anh!!',
            ),
            array(
                'manga_id' => 4,
                'title' => 'Attack on Titan',
                'manga_status' => 1,
                'author_id' => 9,
                'other_name' => 'Đại Chiến Người Khổng Lồ',
                'age_range' => 4,
                'description' => 'Hơn 100 năm trước, giống người khổng lồ Titan đã tấn công và đẩy loài người tới bờ vực tuyệt chủng. Những con người sống sót tụ tập lại, xây bao quanh mình 1 tòa thành 3 lớp kiên cố và tự nhốt mình bên trong để trốn tránh những cuộc tấn công của người khổng lồ. Họ tìm mọi cách để tiêu diệt người khổng lồ nhưng không thành công. Và sau 1 thế kỉ hòa bình, giống khổng lồ đã xuất hiện trở lại, một lần nữa đe dọa sự tồn vong của con người....  Elen và Mikasa phải chứng kiến một cảnh tượng cực kinh khủng - mẹ của mình bị ăn thịt ngay trước mắt. Elen thề rằng cậu sẽ giết tất cả những tên khổng lồ mà cậu gặp.....',
            ),
            array(
                'manga_id' => 5,
                'title' => 'Thanh Gươm Diệt Quỷ',
                'manga_status' => 1,
                'author_id' => 8,
                'other_name' => 'Kimetsu No Yaiba',
                'age_range' => 2,
                'description' => 'Kimetsu no Yaiba – Tanjirou là con cả của gia đình vừa mất cha. Một ngày nọ, Tanjirou đến thăm thị trấn khác để bán than, khi đêm về cậu ở nghỉ tại nhà người khác thay vì về nhà vì lời đồn thổi về ác quỷ luôn rình mò gần núi vào buổi tối. Khi cậu về nhà vào ngày hôm sau, bị kịch đang đợi chờ cậu…',
            ),
            array(
                'manga_id' => 6,
                'title' => 'YANCHA GAL NO ANJOU-SAN',
                'manga_status' => 2,
                'author_id' => 19,
                'other_name' => 'Qua ô cửa sổ',
                'age_range' => 3,
                'description' => '"Tại một trường trung học ở Kasugai, Seto là một học sinh nghiêm túc, sống một cuộc sống bình lặng và bình thường. Nhưng khi người bạn cùng lớp tinh nghịch của anh ấy, Anna Anjō, bắt đầu trêu chọc và đi chơi với anh ấy một cách thường xuyên, điều đó bắt đầu một mối quan hệ thú vị giữa họ. Câu chuyện kể về cuộc sống và những trò hề của hai đối cực, cả về ngoại hình lẫn tính cách, khi họ phát triển thành một cặp đôi lãng mạn thông qua nhiều tương tác vui tươi. Anjō đi cùng với những người bạn nữ của cô, Toyoda và Chita, trong khi Seto đi cùng với những người bạn nam của anh, Inuyama và Tokio. Khi tất cả họ trở nên thân thiện với nhau, mỗi người trở nên có mối quan hệ tình cảm với đối tác tương ứng của họ trong nhóm khi câu chuyện tiến triển."',
            ),
            array(
                'manga_id' => 7,
                'title' => 'Kingdom',
                'manga_status' => 1,
                'author_id' => 10,
                'other_name' => 'Vương nhẫn triều binh',
                'age_range' => 3,
                'description' => 'Bối cảnh truyện được đặt vào thời kỳ Chiến Quốc trong lịch sử Trung Quốc. Tín và Phiêu là hai đứa trẻ mồ côi sống ở nước Tần mang trong mình ước mơ trở thành "Thiên hạ đệ nhất Đại tướng quân". Một ngày nọ, Phiêu được một quan chức triều đình tên là Xương Văn Quân đưa đến cung điện, bỏ lại Tín một mình ở lại ngôi làng nơi họ sinh sống. Vài tháng sau, Phiêu trở lại gặp Tín khi bị thương rất nặng. Trong lúc hấp hối, Phiêu thúc giục Tín đi tới ngôi làng khác và tại đó Tín gặp một thiếu niên có dung mạo rất giống Phiêu. Người đó là Doanh Chính, đương kim Tần vương. Tín hiểu rằng Phiêu được sử dụng làm vật thế thân cho Doanh Chính trong cuộc chiến tranh giành quyền lực. Mặc dù lúc đầu rất giận Doanh Chính nhưng Tín đã chọn con đường phò tá nhà vua trẻ giành lại quyền lực, chiến đấu cho nước Tần để tiến tới danh hiệu "Thiên hạ đệ nhất Đại tướng quân" cũng như giúp Tần vương Chính đạt được ước mơ thống nhất thiên hạ.',
            ),
            array(
                'manga_id' => 8,
                'title' => 'Rise of Dawn',
                'manga_status' => 1,
                'author_id' => 18,
                'other_name' => 'Đấu Phá Thương Khung',
                'age_range' => 3,
                'description' => 'Đấu Phá Thương Khung kể về một thế giới thuộc về Đấu Khí, không hề có ma pháp hoa tiếu diễm lệ, chỉ có đấu khí cương mãnh phồn thịnh! Đấu Phá Thương Khung cũng là nơi mà các Luyện Dược Sư, những nhà luyện đan dược giúp tăng cấp tu luyện, phục hồi sức lực, hay thậm chí cửu tử hoàn sinh vô cùng được trọng vọng bởi tư chất hiếm có của họ. Tưởng tượng thế giới đó sẽ phát triển ra sao? Mời các bạn xem Đấu Phá Thương Khung! Hệ Thống Tu Luyện: Đấu Giả, Đấu Sư, Đại Đấu Sư, Đấu Linh, Đấu Vương, Đấu Hoàng, Đấu Tông, Đấu Tôn, Đấu Thánh, Đấu Đế. Hãy Bắt Đầu Từ Tiêu Viêm – một thiên tài tu luyện trong phút chốc trở thành phế vật, từ phế vật lại từng bước khẳng định lại chính mình! Trên bước đường từng bước khẳng định lại bản thân, trở thành một cao thủ siêu hạng, cũng như một Luyện Dược Sư đỉnh cao, Tiêu Viêm được một vị tôn sư bí mật có thân phận cùng năng lực cực cao không ngừng chỉ dạy. Hãy cùng bắt đầu cuộc hành trình đó với Đấu Phá Thương Khung. Đấu Phá Thương Khung là bộ truyện tranh được chuyển thể từ bộ tiểu thuyết tiên hiệp nổi tiếng cùng tên, tuy nhiên, một số chi tiết đã được thay đổi để bộ truyện có thêm nhiều nét hấp dẫn riêng.',
            ),
            array(
                'manga_id' => 9,
                'title' => 'Inuyasha',
                'manga_status' => 1,
                'author_id' => 17,
                'other_name' => 'Khuyển dạ xoa',
                'age_range' => 3,
                'description' => 'Ở Tokyo ngày nay, Kagome Higurashi sống trong khuôn viên ngôi đền Thần đạo của gia đình cô cùng với mẹ, ông nội và em trai. Vào ngày sinh nhật thứ mười lăm của mình, khi đang tìm kiếm con mèo của mình, Kagome bị một con quỷ rết xuất hiện từ đó kéo vào Giếng ăn xương (骨喰いの井戸, Honekui no Ido) được cất giữ. Thay vì chạm đáy, Kagome thấy mình ở một vũ trụ khác song song với vũ trụ của cô ấy - nhưng trong quá khứ, trong thời kỳ Sengoku của Nhật Bản. Kagome được tiết lộ là tái sinh của Kikyo hiện đã chết. Viên ngọc Shikon đã bị đốt cháy cùng với cơ thể của Kikyo để loại bỏ nó hoàn toàn khỏi thế giới này, nhằm giữ nó an toàn khỏi bàn tay của những kẻ sẽ sử dụng sức mạnh của nó cho mục đích xấu xa. Kagome tình cờ gặp một cậu bé đang ngủ bị mũi tên thiêng ghim vào gốc cây, biết được cậu ta chính là Inuyasha, một nửa người nửa quỷ (yōkai) mà Kikyo đã ghim vào cây như hành động cuối cùng của cô khi cậu định đánh cắp viên ngọc.',
            ),
            array(
                'manga_id' => 10,
                'title' => 'Naruto',
                'manga_status' => 2,
                'author_id' => 13,
                'other_name' => 'Đi tìm Sasuke',
                'age_range' => 1,
                'description' => 'Một con cáo mạnh mẽ được gọi là Cửu Vĩ tấn công Konoha, ngôi làng lá ẩn trong Hỏa Quốc, một trong Ngũ Đại Shinobi Quốc gia trong Thế giới Ninja. Đáp lại, thủ lĩnh của Konoha và Hokage đệ tứ, Minato Namikaze, đã phong ấn con cáo vào trong cơ thể của đứa con trai mới sinh của mình, Naruto Uzumaki, biến Naruto thành vật chủ của con quái thú, điều này đã khiến cha của Naruto phải trả giá bằng mạng sống của mình, và Hokage đệ tam trở về sau khi nghỉ hưu. trở thành lãnh đạo của Konoha một lần nữa. Naruto thường bị dân làng Konoha khinh bỉ vì là chủ nhân của Cửu Vĩ. Do một sắc lệnh của Hokage Đệ Tam cấm đề cập đến những sự kiện này, Naruto không biết gì về Cửu Vĩ cho đến 12 năm sau, khi Mizuki, một ninja phản bội, tiết lộ sự thật cho Naruto. Naruto sau đó đánh bại Mizuki trong trận chiến, nhận được sự kính trọng của giáo viên của mình, Iruka Umino. Câu chuyện kể về tình bạn và sự hy sinh cao cả của những người đồng đội trong thế giới Ninja',
            ),
            array(
                'manga_id' => 11,
                'title' => 'I\'m your sister now',
                'manga_status' => 2,
                'author_id' => 15,
                'other_name' => 'Oniichan wa oshimai!',
                'age_range' => 3,
                'description' => 'Sau một số nhiệm vụ, bao gồm một nhiệm vụ lớn ở Sóng quốc, Kakashi cho phép Đội 7 tham gia kỳ thi ninja, giúp họ thăng cấp lên cấp cao hơn và thực hiện các nhiệm vụ khó hơn, được gọi là Kỳ thi Chunin. Trong kỳ thi, Orochimaru, một tên tội phạm bị truy nã, đã xâm chiếm làng Lá và giết Hokage Đệ Tam để trả thù. Jiraiya, một trong ba ninja huyền thoại, đã từ chối danh hiệu Hokage Đệ Ngũ và cùng Naruto tìm kiếm Tsunade, người mà ông chọn để trở thành Hokage Đệ Ngũ thay thế.',
            ),
            array(
                'manga_id' => 12,
                'title' => 'Tháng tư là lời nói dối của em',
                'manga_status' => 1,
                'author_id' => 3,
                'other_name' => 'Shigatsu wa kimi no uso',
                'age_range' => 2,
                'description' => 'Thần đồng piano Arima Kousei, sau rối bời tang gia, đã tự mình giải nghệ. Cậu không hề động vào cây đàn cũng như nghe nhạc của chính mình suốt 2 năm. Cho đến khi sợi dây số phận của cậu bắt ngang Miyazono Kaori, một nữ sinh cùng trường, một nghệ sĩ violin xuất chúng. Cô ấy đã quyết tâm giúp Arima mở ra một góc nhìn mới trong âm nhạc cũng như kéo vực lại năng lực âm nhạc thần đồng bên trong cậu. Câu truyện có kết cục buồn nhưng những phần ngoại truyện cũng đã giúp níu kéo được lại được những tháng ngày hạnh phúc.',
            ),
            array(
                'manga_id' => 13,
                'title' => 'Gia đình điệp viên',
                'manga_status' => 2,
                'author_id' => 5,
                'other_name' => 'Spy x Family',
                'age_range' => 3,
                'description' => 'Câu chuyện về một điệp viên của Tây Quốc (西国) đang cố gắng trà trộn và thu thập thông tin tình báo tại Đông Quốc (東国) bằng cách xây dựng một lớp bọc gia đình giả tạo.',
            ),
            array(
                'manga_id' => 14,
                'title' => 'Fairy tail',
                'manga_status' => 1,
                'author_id' => 11,
                'other_name' => 'Hội pháp sư',
                'age_range' => 3,
                'description' => 'Xin đón chào các bạn đến với Fairy Tail – một thế giới tràn đầy phép thuật, những pháp sư có thể hô mưa, gọi gió, những con mèo biết bay và những quái vật trong truyền thuyết. Tại vùng đất Fiore, bạn sẽ gặp được tổ chức Fairy Tail, một tổ chức pháp sư có những thành viên vui tính, thú vị và mạnh mẽ nhất. Câu chuyện bắt đầu khi cô gái trẻ Lucy, người có khả năng kêu gọi các tinh linh và ước mơ được gia nhập một tổ chức phù thủy gặp được hỏa pháp sư Natsu đang trên đường tìm kiếm cha nuôi của mình tại thị trấn cảng Harujion...',
            ),
            array(
                'manga_id' => 15,
                'title' => 'Jujutsu Kaisen',
                'manga_status' => 2,
                'author_id' => 2,
                'other_name' => 'Chú thuật hồi chiến',
                'age_range' => 3,
                'description' => 'Yuuji Itadori là một thiên tài có tốc độ và sức mạnh, nhưng cậu ấy muốn dành thời gian của mình trong Câu lạc bộ Tâm Linh. Một ngày sau cái chết của ông mình, anh gặp Megumi Fushiguro, người đang tìm kiếm vật thể bị nguyền rủa mà các thành viên CLB đã tìm thấy.   Đối mặt với những con quái vật khủng khiếp bị "Ám", Yuuji nuốt vật thể bị phong ấn để có được sức mạnh của nó và cứu bạn bè của mình! Nhưng giờ Yuuji là người bị "Ám", và cậu ấy sẽ bị kéo vào thế giới ma quỷ ly kỳ của Megumi và những con quái vật độc ác ... ',
            ),
            array(
                'manga_id' => 16,
                'title' => 'Haikyuu!!!',
                'manga_status' => 1,
                'author_id' => 7,
                'other_name' => 'Người khổng lồ tý hon',
                'age_range' => 1,
                'description' => 'Hinata Shouyou – nhân vật chính của Haikyuu, kể từ khi xem xong một trận bóng chuyền đã thần tượng và mơ ước trở thành “Người khổng lồ tí hon” rồi gia nhập đội bóng chuyền của trường trung học. Sau khi tìm đủ thành viên, họ đã tham gia giải đấu liên trường, tại đây họ đã chạm trán với “Vua sân đấu” Kageyama Tobio và bị dập cho tả tơi. Dù thua nhưng Shouyou vẫn quyết tâm trở thành cầu thủ số một và trả đũa Kageyama. Tuy nhiên, lên cấp 3, oan gia ngõ hẹp thế nào, 2 cậu bé lại gặp nhau trong cùng 1 đội. Câu chuyện sẽ tiếp diễn ra sao?',
            ),
            array(
                'manga_id' => 17,
                'title' => 'Daiya no ace',
                'manga_status' => 1,
                'author_id' => 20,
                'other_name' => 'Diamond no ace',
                'age_range' => 1,
                'description' => 'Truyện kể về Sawamura Eijun, một Pitcher của một đội bóng tầm thường. Khi ngôi trường đang học sắp đóng cửa, cậu tình cờ được mời về một ngôi trường có đẳng cấp quốc gia. Từ đây, cậu quyết định theo đuổi bóng chày..... ',
            ),
            array(
                'manga_id' => 18,
                'title' => 'Kuroko no baseket ',
                'manga_status' => 1,
                'author_id' => 6,
                'other_name' => 'Bóng rổ của Kuroko',
                'age_range' => 1,
                'description' => '“Generation of Miracles”, tên của đội bóng rỗ trường THCS Teikou, đã từng đoạt chức vô địch toàn quốc 3 năm liền . 5 ngôi sao của đội đều là những thiên tài nhưng đã tách ra và theo học ở những trường THPT khác nhau với các đội bóng mạnh . Nhưng có 1 chuyện mà ít người hay biết đó là “Generation of Miracles” còn có 1 thành viên thứ 6 . Kuroko Tetsuya, thành viên thứ 6 của đội tham gia 1 trường THPT với đội bóng rỗ chỉ vừa thành lập 1 năm . Nhưng điều bất ngờ là cậu lại có 1 cơ thể yếu ớt và lại chẳng bao giờ ném banh chính xác . Vậy điều gì đã làm cậu ta trở thành thành viên thứ 6 của “Generation of Miracles”? ',
            ),
            array(
                'manga_id' => 19,
                'title' => 'Blue lock',
                'manga_status' => 2,
                'author_id' => 16,
                'other_name' => 'Lam ngục',
                'age_range' => 2,
                'description' => 'Yoichi Isagi đã bỏ lỡ cơ hội tham dự giải Cao Trung toàn quốc do đã chuyền cho đồng đội thay vì tự thân mình dứt điểm. Cậu là một trong 300 chân sút U-18 được tuyển chọn bởi Jinpachi Ego, người đàn ông được Hiệp Hội Bóng Đá Nhật Bản thuê sau hồi FIFA World Cup năm 2018, nhằm dẫn dắt Nhật Bản vô địch World Cup bằng cách tiêu diệt nền bóng đá Nhật Bản. Kế hoạch của Ego gồm việc cô lập 300 tay sút trong một nhà ngục - dưới một tổ chức với tên gọi là "Blue Lock", với mục tiêu là tạo ra chân sút "tự phụ" nhất thế giới, điều mà nền bóng đá Nhật Bản còn thiếu.',
            ),
            array(
                'manga_id' => 20,
                'title' => 'Dragon Ball',
                'manga_status' => 1,
                'author_id' => 1,
                'other_name' => '7 viên ngọc rồng',
                'age_range' => 2,
                'description' => 'Câu truyện kể về một cậu bé tên Songoku cùng nhóm bạn của mình tham gia những chuyến phiêu lưu tìm ngọc rồng, chống lại cái ác bảo vệ trái đất.',
            ),
        ));
    }
}
